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
            'peticion' => $this->getPeticionTemplate($name, $cun, $date, $pqrs->city),
            'queja' => $this->getQuejaTemplate($name, $cun, $date, $pqrs->city),
            'reclamo' => $this->getReclamoTemplate($name, $cun, $date, $pqrs->city),
            'sugerencia' => $this->getSugerenciaTemplate($name, $cun, $date, $pqrs->city),
            'reposicion' => $this->getReposicionTemplate($name, $cun, $date, $pqrs->city),
            'apelacion' => $this->getApelacionTemplate($name, $cun, $date, $pqrs->city),
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

    protected function getPeticionTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Petición CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Reciba un cordial saludo de parte de Intalnet. Por medio de la presente confirmamos el recibo de su petición.</p>
            <p>Le informamos que su solicitud será atendida dentro del término legal establecido de <strong>10 días hábiles</strong>.</p>
            <p>Agradecemos su confianza en nuestros servicios.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getQuejaTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Queja CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Reciba un cordial saludo de parte de Intalnet. Por medio de la presente confirmamos el recibo de su queja.</p>
            <p>Le informamos que su solicitud será atendida dentro del término legal establecido de <strong>15 días hábiles</strong> (prorrogables por 15 días más si se requiere).</p>
            <p>Agradecemos su retroalimentación para mejorar nuestro servicio.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getReclamoTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Reclamo CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Reciba un cordial saludo de parte de Intalnet. Por medio de la presente confirmamos el recibo de su reclamo.</p>
            <p>Le informamos que su solicitud será atendida dentro del término legal establecido de <strong>15 días hábiles</strong> (prorrogables por 15 días más si se requiere).</p>
            <p>Estaremos revisando su caso detalladamente.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getSugerenciaTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Sugerencia Radicado No. $cun</p>
            <p>Cordial saludo,</p>
            <p>Reciba un cordial saludo de parte de Intalnet. Agradecemos su sugerencia, la cual es muy valiosa para nosotros.</p>
            <p>Le informamos que su solicitud ha sido recibida y será evaluada dentro del término de <strong>30 días hábiles</strong>.</p>
            <p>Gracias por ayudarnos a mejorar.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getReposicionTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Recurso de Reposición CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Reciba un cordial saludo de parte de Intalnet. Por medio de la presente confirmamos el recibo de su recurso de reposición.</p>
            <p>Le informamos que su solicitud será resuelta dentro del término legal establecido de <strong>15 días hábiles</strong>.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }

    protected function getApelacionTemplate($name, $cun, $date, $city): string
    {
        return "
            <p><strong>Ciudad y Fecha:</strong> $city, $date</p>
            <p><strong>Señor(a):</strong> $name</p>
            <p><strong>Referencia:</strong> Respuesta a Recurso de Apelación CUN $cun</p>
            <p>Cordial saludo,</p>
            <p>Reciba un cordial saludo de parte de Intalnet. Por medio de la presente confirmamos el recibo de su recurso de apelación.</p>
            <p>Le informamos que su solicitud será resuelta dentro del término legal establecido de <strong>15 días hábiles</strong>.</p>
            <p>Atentamente,</p>
            <p><strong>Intalnet Área Servicio al Cliente</strong></p>
        ";
    }
}
