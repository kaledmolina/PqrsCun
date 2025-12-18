<?php

namespace App\Services;

use App\Models\Pqrs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

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
        $name = $pqrs->first_name . ' ' . $pqrs->last_name;
        $cun = $pqrs->cun;
        $date = now()->format('d/m/Y');
        
        return match ($type) {
            'peticion' => $this->getOfficialPeticionTemplate($name, $cun, $date, $pqrs->city),
            'queja_reclamo' => $this->getOfficialQuejaTemplate($name, $cun, $date, $pqrs->city), // Using Queja template for unified type for now
            'queja' => $this->getOfficialQuejaTemplate($name, $cun, $date, $pqrs->city),
            'reclamo' => $this->getOfficialReclamoTemplate($name, $cun, $date, $pqrs->city),
            'sugerencia' => $this->getOfficialSugerenciaTemplate($name, $cun, $date, $pqrs->city),
            'reposicion' => $this->getOfficialReposicionTemplate($name, $cun, $date, $pqrs->city),
            'apelacion' => $this->getOfficialApelacionTemplate($name, $cun, $date, $pqrs->city),
            default => '',
        };
    }

    public function generatePdf(string $content, Pqrs $pqrs): string
    {
        $pdf = Pdf::loadView('pdf.response', [
            'content' => $content,
            'pqrs' => $pqrs,
            'date' => now()->format('d/m/Y'),
        ]);

        $fileName = 'respuesta_' . $pqrs->cun . '_' . time() . '.pdf';
        $path = 'pqrs_responses/' . $fileName;

        Storage::disk('public')->put($path, $pdf->output());

        return $path;
    }

    // --- Quick Response Template (General) ---

    protected function getQuickResponseGeneralTemplate($name, $cun, $date, $description): string
    {
        return "
            <p>Estimado(a) <strong>$name</strong>,</p>
            <p>Su solicitud ha sido recibida y registrada con la siguiente información:</p>
            <ul>
                <li><strong>Número de radicado:</strong> $cun</li>
                <li><strong>Fecha de radicación:</strong> $date</li>
                <li><strong>Usuario:</strong> $name</li>
                <li><strong>Descripción del requerimiento:</strong> $description</li>
            </ul>
            <p>Para consultar el estado de su solicitud, puede ingresar con su código CUN en el siguiente enlace:</p>
            <p><a href=\"https://pqr.intalnet.com\">https://pqr.intalnet.com</a></p>
            <p>Este mensaje es generado automáticamente. Por favor, no responda a este correo.</p>
            <p>Si requiere más información, comuníquese directamente con Intalnet Telecomunicaciones por nuestros canales oficiales.</p>
            <p style=\"font-size: 10px; color: #999;\">Este correo es informativo y de uso exclusivo del destinatario. Puede contener información confidencial. Si usted no es el destinatario, elimine el mensaje de inmediato. La reproducción o difusión no autorizada está estrictamente prohibida.</p>
        ";
    }

    // --- Official Response Templates (Final Decision) ---

    protected function getOfficialPeticionTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta Oficial a Petición CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>En atención a su petición radicada en nuestro sistema, nos permitimos informarle que hemos procesado su solicitud de acuerdo con los términos establecidos por la ley.</p>
            <p><strong>Respuesta de fondo:</strong></p>
            <p>[ESCRIBA AQUÍ LA RESPUESTA DETALLADA A LA PETICIÓN]</p>
            <p>Esperamos haber resuelto su inquietud de manera satisfactoria.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getOfficialQuejaTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta Oficial a Queja CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Hemos recibido su queja respecto a la inconformidad manifestada. Lamentamos los inconvenientes causados y le informamos que hemos tomado las medidas correctivas necesarias.</p>
            <p><strong>Acciones tomadas:</strong></p>
            <p>[ESCRIBA AQUÍ LAS ACCIONES TOMADAS Y LA RESPUESTA A LA QUEJA]</p>
            <p>Agradecemos su retroalimentación para mejorar nuestro servicio.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getOfficialReclamoTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta Oficial a Reclamo CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>En respuesta a su reclamo sobre la falla en la prestación del servicio, le informamos que hemos realizado la revisión técnica y administrativa correspondiente.</p>
            <p><strong>Resultado de la revisión:</strong></p>
            <p>[ESCRIBA AQUÍ EL RESULTADO TÉCNICO/ADMINISTRATIVO Y LA SOLUCIÓN]</p>
            <p>Quedamos atentos a cualquier inquietud adicional.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getOfficialSugerenciaTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta Oficial a Sugerencia Radicado No. $cun</p>
            <p>Cordial saludo,</p>
            <p>Agradecemos sinceramente su sugerencia. Para nosotros es muy importante conocer la opinión de nuestros usuarios para fortalecer nuestros procesos.</p>
            <p>Hemos remitido su observación al área encargada para su evaluación.</p>
            <p><strong>Gestión realizada:</strong></p>
            <p>[ESCRIBA AQUÍ LA GESTIÓN O ANÁLISIS DE LA SUGERENCIA]</p>
            <p>Gracias por ayudarnos a mejorar.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getOfficialReposicionTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta Oficial a Recurso de Reposición CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Procedemos a dar respuesta al recurso de reposición interpuesto por usted frente a la decisión inicial tomada por la empresa.</p>
            <p>Hemos revisado nuevamente los hechos y pruebas aportadas.</p>
            <p><strong>Decisión final:</strong></p>
            <p>[ESCRIBA AQUÍ LA DECISIÓN FINAL: CONFIRMA, MODIFICA O REVOCA]</p>
            <p>Contra esta decisión procede el recurso de apelación.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getOfficialApelacionTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta Oficial a Recurso de Apelación CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Procedemos a dar respuesta al recurso de apelación interpuesto por usted.</p>
            <p>El caso ha sido revisado por la instancia superior correspondiente.</p>
            <p><strong>Decisión de segunda instancia:</strong></p>
            <p>[ESCRIBA AQUÍ LA DECISIÓN DE SEGUNDA INSTANCIA]</p>
            <p>Con esta decisión se agota la vía gubernativa.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }
}
