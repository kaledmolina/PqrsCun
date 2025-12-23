<?php

namespace App\Services;

use App\Models\Pqrs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PqrsResponseService
{
    public function getQuickResponseTemplate(Pqrs $pqrs, string $type): string
    {
        $name = $pqrs->first_name . ' ' . $pqrs->last_name;
        $cun = $pqrs->cun;
        $date = now()->format('d/m/Y');
        
        return match ($type) {
            'peticion' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            'queja_reclamo' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            'queja' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            'reclamo' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            'sugerencia' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            'reposicion' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            'apelacion' => $this->getQuickResponseGeneralTemplate($name, $cun, $date, $pqrs->description),
            default => '',
        };
    }

    public function getOfficialResponseTemplate(Pqrs $pqrs, string $type): string
    {
        // For distinct bodies per type, we can pass distinct 'response body' placeholders or text
        // But the user template request implies a unified structure.
        // I will use specific response body placeholders for each type if helpful, 
        // or just a generic placeholder if that corresponds better to the request.
        // The user provided examples: "Según revisión técnica...", etc.
        
        $placeholders = match ($type) {
            'peticion' => "En respuesta de fondo: [ESCRIBA AQUÍ LA RESPUESTA A LA PETICIÓN]",
            'queja_reclamo', 'queja' => "Según revisión técnica realizada el día [fecha], se evidenció que... [describir hallazgo y acciones correctivas]",
            'reclamo' => "Según revisión técnica realizada el día [fecha], se evidenció que... [describir hallazgo y acciones correctivas]",
            'sugerencia' => "Hemos remitido su observación al área encargada... [ESCRIBA AQUÍ LA GESTIÓN]",
            'reposicion' => "Hemos revisado nuevamente los hechos... [DECISIÓN FINAL: CONFIRMA, MODIFICA O REVOCA]",
            'apelacion' => "El caso ha sido revisado por la instancia superior... [DECISIÓN DE SEGUNDA INSTANCIA]",
            default => "[ESCRIBA AQUÍ LA RESPUESTA]",
        };

        return $this->getUnifiedOfficialResponseTemplate($pqrs, $placeholders);
    }

    public function generatePdf(string $content, Pqrs $pqrs): string
    {
        // Replace signature placeholder with Local File Path for DomPDF
        $signaturePath = storage_path('app/private/firma.png');
        $signatureHtml = '<p>__________________________________</p>';
        
        if (file_exists($signaturePath)) {
            $signatureHtml = '<img src="' . $signaturePath . '" alt="Firma" width="120" style="display: block; margin-bottom: 5px;">';
        }
        
        $content = str_replace('[[FIRMA_GERENTE]]', $signatureHtml, $content);

        $pdf = Pdf::loadView('pdf.response', [
            'content' => $content,
            'pqrs' => $pqrs,
            'date' => now()->format('d/m/Y'),
        ]);

        // Encryption with user ID (Cédula/NIT)
        if ($pqrs->document_number) {
            $pdf->setEncryption($pqrs->document_number);
        }

        $fileName = 'respuesta_' . $pqrs->cun . '_' . time() . '.pdf';
        $path = 'pqrs_responses/' . $fileName;

        // Save to 'local' disk (configured to storage/app/private)
        Storage::disk('local')->put($path, $pdf->output());

        return $path;
    }

    // ... (quick response, etc)

    protected function getUnifiedOfficialResponseTemplate(Pqrs $pqrs, string $responseBodyPlaceholder): string
    {
        // ... (data setup)
        Carbon::setLocale('es');
        $city = $pqrs->city ?? 'Montería';
        $now = now()->isoFormat('D [de] MMMM [de] YYYY');
        $fullDate = "$city, $now";
        
        $name = $pqrs->first_name . ' ' . $pqrs->last_name;
        $address = $pqrs->address ?? '[Dirección del usuario]';
        $contract = $pqrs->contract_number ?? '[Número]';
        $email = $pqrs->email ?? '[Correo]';
        $cun = $pqrs->cun;
        $createdDate = $pqrs->created_at ? $pqrs->created_at->isoFormat('D [de] MMMM [de] YYYY') : '[Fecha recibida]';
        $responseDate = $pqrs->created_at ? $this->addBusinessDays($pqrs->created_at->copy(), 15)->isoFormat('D [de] MMMM [de] YYYY') : '[Fecha calculada]';
        
        $description = $pqrs->description ?? '[describir brevemente la queja, petición o reclamo]';

        // Use Placeholder
        $signaturePlaceholder = '[[FIRMA_GERENTE]]';

        return "
            <p>$fullDate</p>
            <p>Señor(a):<br>
            <strong>$name</strong><br>
            Dirección: $address<br>
            Número de suscriptor: $contract<br>
            Correo electrónico: $email</p>

            <p><strong>Asunto:</strong> Respuesta a PQR presentada por el usuario<br>
            <strong>Referencia:</strong> PQR radicada No. $cun, recibida el día $createdDate</p>

            <p><strong>Fecha de respuesta (máxima):</strong> $responseDate</p>

            <p>Agradecemos su comunicación y el interés en mejorar nuestro servicio. INTALNET TELECOMUNICACIONES, reafirma su compromiso con la atención oportuna y técnica de cada uno de los requerimientos de nuestros usuarios.</p>

            <h3>1. ANTECEDENTES.</h3>
            <p>En atención a la PQR radicada por el(la) señor(a) $name el día $createdDate, mediante la cual manifestó que, $description, la empresa INTALNET TELECOMUNICACIONES, en cumplimiento de lo establecido en la normatividad vigente, procede a emitir respuesta dentro de los términos legales establecidos para tal fin.</p>

            <h3>2. RESPUESTA.</h3>
            <p>Luego de realizar la verificación correspondiente en los sistemas internos y con el área encargada, nos permitimos informar lo siguiente:</p>
            <p>$responseBodyPlaceholder</p>
            <p>En caso de que se requieran acciones adicionales o una visita técnica, se dejará establecido en este punto.</p>
            <p>Adjunto encontrará el documento [nombre del archivo] (si aplica), donde se evidencia [indicar que contiene].</p>

            <h3>3. RECURSOS Y CANALES DE CONTACTO.</h3>
            <p>En caso de no estar de acuerdo con la respuesta que le hemos dado, puede presentar ante nosotros recurso de reposición o recurso de reposición y en subsidio de apelación dentro de los diez (10) días hábiles siguientes a la notificación de esta decisión. Lo puede hacer a través de nuestros canales oficiales: correo electrónico: pqr@intalnet.com, teléfono de Atención al Cliente: 314 8042601, o mediante nuestra página web <a href=\"https://intalnettelecomunicaciones.com/\">https://intalnettelecomunicaciones.com/</a>.</p>

            <p>Por favor tenga en cuenta que el recurso de reposición es la solicitud para que el operador revise nuevamente su decisión dentro de los 15 días hábiles siguientes a su radicación, si transcurrido este término el operador no ha resuelto dicho recurso, se entenderá que su solicitud o reclamación ha sido resuelta de forma favorable (Silencio Administrativo Positivo).</p>

            <p>Por su parte, el recurso de reposición y en subsidio apelación es la solicitud para que el operador revise nuevamente su decisión y, en caso de que la respuesta al recurso de reposición sea desfavorable, el expediente sea remitido a la Superintendencia de Industria y Comercio para que dicha Autoridad, decida de fondo.</p>

            <p>Atentamente;</p>

            <br><br>
            <p>$signaturePlaceholder<br>
            <strong>ANGELA MARIA SEJIN M.</strong><br>
            Gerente General<br>
            INTALNET TELECOMUNICACIONES<br>
            Correo: servicioalcliente@intalnet.com<br>
            Teléfono: +57 314 8042601<br>
            Anexos (si aplica):<br>
            [Listado de documentos enviados con la respuesta]</p>

            <br><br>
            <div style=\"font-size: 10px; text-align: justify; color: #666;\">
                De conformidad con lo dispuesto en la regulación vigente, INTALNET TELECOMUNICACIONES, informa al usuario que las PQRS presentados, serán atendidos y resueltos mediante una respuesta clara, completa y de fondo dentro de un término máximo de quince (15) días hábiles, contados a partir del día hábil siguiente a la fecha de su radicación. Si su PQR no es atendida en la fecha indicada, se entenderá que ha sido resuelta a su favor. (Esto se llama Silencio Administrativo Positivo). RECURSOS. Dentro de los 10 días hábiles siguientes a la notificación de la decisión y cuando INTALNET TELECOMUNICACIONES NO resuelva a su favor la petición o queja, en relación con actos de negativa del contrato, suspensión del servicio, terminación del contrato, corte y facturación, Ud, tendrá derecho a solicitar que se reconsidere la decisión tomada, a través de la presentación de recursos en cualquiera de los canales de atención, teniendo la opción de presentar RECURSO DE REPOSICIÓN bajo el cual solicita a INTALNET TELECOMUNICACIONES, que revise nuevamente la decisión o RECURSO DE REPOSICION Y EN SUBSIDIO APELACION para que INTALNET TELECOMUNICACIONES revise la decisión y si no se accede a lo solicitado remita el expediente a la Superintendencia de Industria y Comercio (SIC) para que esta entidad revise y adopte una decisión final y definitiva. Para estos efectos, INTALNET TELECOMUNICACIONES, tiene habilitados los siguientes canales de atención: Teléfono de Atención al Cliente 3148042601, correo electrónico pqr@intalnet.com, y la página web https://intalnettelecomunicaciones.com/, a través de los cuales el usuario podrá radicar sus solicitudes y hacer seguimiento a las mismas.
            </div>
        ";
    }
    
    /**
     * Calculate business days skipping weekends and Colombian holidays.
     */
    protected function addBusinessDays(Carbon $startDate, int $days): Carbon
    {
        $date = $startDate->copy();
        
        // Colombian Holidays 2024-2026 (Y-m-d)
        $holidays = [
            // 2024 (Remaining)
            '2024-12-08', '2024-12-25',
            
            // 2025
            '2025-01-01', '2025-01-06', '2025-03-24', 
            '2025-04-17', '2025-04-18', '2025-05-01', 
            '2025-06-02', '2025-06-23', '2025-06-30', 
            '2025-07-20', '2025-08-07', '2025-08-18', 
            '2025-10-13', '2025-11-03', '2025-11-17', 
            '2025-12-08', '2025-12-25',

            // 2026
            '2026-01-01', '2026-01-12', '2026-03-23', 
            '2026-04-02', '2026-04-03', '2026-05-01', 
            '2026-05-18', '2026-06-08', '2026-06-15', 
            '2026-06-29', '2026-07-20', '2026-08-07', 
            '2026-08-17', '2026-10-12', '2026-11-02', 
            '2026-11-16', '2026-12-08', '2026-12-25',
        ];

        while ($days > 0) {
            $date->addDay();
            
            // Check if weekend (Saturday or Sunday)
            if ($date->isWeekend()) {
                continue;
            }

            // Check if holiday
            if (in_array($date->format('Y-m-d'), $holidays)) {
                continue;
            }

            $days--;
        }

        return $date;
    }
}

