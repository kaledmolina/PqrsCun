<?php

namespace App\Services;

use App\Models\Pqrs;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class PqrsResponseService
{
    public function getTemplate(Pqrs $pqrs, string $type): string
    {
        $name = $pqrs->first_name . ' ' . $pqrs->last_name;
        $cun = $pqrs->cun;
        $date = now()->format('d/m/Y');
        
        return match ($type) {
            'peticion' => $this->getPeticionTemplate($name, $cun, $date),
            'queja' => $this->getQuejaTemplate($name, $cun, $date),
            'reclamo' => $this->getReclamoTemplate($name, $cun, $date),
            'sugerencia' => $this->getSugerenciaTemplate($name, $cun, $date),
            'recurso' => $this->getRecursoTemplate($name, $cun, $date),
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

    protected function getPeticionTemplate($name, $cun, $date): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> Tunja, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Petición CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>En atención a su petición radicada en nuestro sistema, nos permitimos informarle que hemos procesado su solicitud de acuerdo con los términos establecidos por la ley (10 a 15 días hábiles).</p>
            <p><strong>Respuesta de fondo:</strong></p>
            <p>[ESCRIBA AQUÍ LA RESPUESTA DETALLADA A LA PETICIÓN]</p>
            <p>Esperamos haber resuelto su inquietud de manera satisfactoria.</p>
            <p>Atentamente,</p>
            <p><strong>Departamento de Servicio al Cliente</strong><br>CUN</p>
        ";
    }

    protected function getQuejaTemplate($name, $cun, $date): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> Tunja, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Queja CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Hemos recibido su queja respecto a la inconformidad manifestada. Lamentamos los inconvenientes causados y le informamos que hemos tomado las medidas correctivas necesarias.</p>
            <p>De acuerdo con la normatividad vigente, damos respuesta dentro del término de 15 días hábiles.</p>
            <p><strong>Acciones tomadas:</strong></p>
            <p>[ESCRIBA AQUÍ LAS ACCIONES TOMADAS Y LA RESPUESTA A LA QUEJA]</p>
            <p>Agradecemos su retroalimentación para mejorar nuestro servicio.</p>
            <p>Atentamente,</p>
            <p><strong>Departamento de Calidad</strong><br>CUN</p>
        ";
    }

    protected function getReclamoTemplate($name, $cun, $date): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> Tunja, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Reclamo CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>En respuesta a su reclamo sobre la falla en la prestación del servicio, le informamos que hemos realizado la revisión técnica y administrativa correspondiente.</p>
            <p>El tiempo de respuesta para reclamos es de 15 días hábiles según la regulación.</p>
            <p><strong>Resultado de la revisión:</strong></p>
            <p>[ESCRIBA AQUÍ EL RESULTADO TÉCNICO/ADMINISTRATIVO Y LA SOLUCIÓN]</p>
            <p>Quedamos atentos a cualquier inquietud adicional.</p>
            <p>Atentamente,</p>
            <p><strong>Departamento Técnico</strong><br>CUN</p>
        ";
    }

    protected function getSugerenciaTemplate($name, $cun, $date): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> Tunja, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Sugerencia CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Agradecemos sinceramente su sugerencia. Para nosotros es muy importante conocer la opinión de nuestros usuarios para fortalecer nuestros procesos.</p>
            <p>Hemos remitido su observación al área encargada para su evaluación.</p>
            <p><strong>Gestión realizada:</strong></p>
            <p>[ESCRIBA AQUÍ LA GESTIÓN O ANÁLISIS DE LA SUGERENCIA]</p>
            <p>Gracias por ayudarnos a mejorar.</p>
            <p>Atentamente,</p>
            <p><strong>Servicio al Cliente</strong><br>CUN</p>
        ";
    }

    protected function getRecursoTemplate($name, $cun, $date): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> Tunja, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Recurso de Reposición/Apelación CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Procedemos a dar respuesta al recurso interpuesto por usted frente a la decisión inicial tomada por la empresa.</p>
            <p>Hemos revisado nuevamente los hechos y pruebas aportadas, dentro del término legal de 15 días hábiles.</p>
            <p><strong>Decisión final:</strong></p>
            <p>[ESCRIBA AQUÍ LA DECISIÓN FINAL: CONFIRMA, MODIFICA O REVOCA]</p>
            <p>Contra esta decisión [PROCEDE/NO PROCEDE] recurso alguno.</p>
            <p>Atentamente,</p>
            <p><strong>Dirección Jurídica</strong><br>CUN</p>
        ";
    }
}
