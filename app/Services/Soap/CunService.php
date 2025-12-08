<?php

namespace App\Services\Soap;

use Illuminate\Support\Facades\Log;
use App\Models\Pqrs; // Tu modelo real
use Carbon\Carbon;

class CunService
{
    /**
     * Método principal que consume la SIC
     */
    public function consultaCUN($params)
    {
        try {
            // 1. Obtener parámetros enviados por la SIC
            // Nota: La SIC envía esto como enteros, ejemplo: 4436, 25, 1
            $io = $params->identificadorOperador; 
            $anio = $params->anoRadicacionCun;
            $consecutivoInput = $params->ConsecutivoRadCun;

            // 2. Reconstruir el CUN para buscar en tu BD
            // Tu generador usa %010d, así que debemos rellenar con ceros a la izquierda
            $consecutivoPadded = sprintf('%010d', $consecutivoInput);
            
            // Armamos el string: "4436-25-0000000001"
            $cunString = "{$io}-{$anio}-{$consecutivoPadded}";

            Log::info("SIC consultando CUN: " . $cunString);

            // 3. Buscar en tu base de datos usando Eloquent
            $pqr = Pqrs::where('cun', $cunString)->first();

            if (!$pqr) {
                // Si no existe, retornamos error 124 (Info insuficiente/No encontrado)
                return ['respuesta' => $this->buildErrorXml('124', 'No se encontró información para el CUN suministrado')];
            }

            // 4. Construir el XML de respuesta exitosa
            $xmlContent = $this->buildSuccessXml($pqr, $io, $anio, $consecutivoPadded);

            return ['respuesta' => $xmlContent];

        } catch (\Exception $e) {
            Log::error("Error en servicio SOAP CUN: " . $e->getMessage());
            return ['respuesta' => $this->buildErrorXml('123', 'Error interno del servidor')];
        }
    }

    /**
     * Construye el XML de éxito basado en el Anexo Técnico (Pág 25)
     */
    private function buildSuccessXml(Pqrs $pqr, $io, $anio, $consecutivo)
    {
        // 1. Formateo de Nombres (Separar primer y segundo nombre/apellido)
        $nombres = $this->separarNombres($pqr->first_name);
        $apellidos = $this->separarNombres($pqr->last_name);

        // 2. Mapeo de Tipo de Documento (Tu BD -> Código SIC)
        // Ajusta estos case según lo que guardes en $pqr->document_type
        $tipoIdSic = match(strtoupper($pqr->document_type)) {
            'CC', 'CEDULA' => 'CC',
            'CE' => 'CE',
            'NIT' => 'NI',
            'TI' => 'TI',
            'PASAPORTE' => 'PA',
            default => 'CC' // Valor por defecto o manejar error
        };
        
        $nombreTipoId = match($tipoIdSic) {
            'CC' => 'CEDULA DE CIUDADANIA',
            'CE' => 'CEDULA DE EXTRANJERIA',
            'NI' => 'NIT',
            default => 'DOCUMENTO DE IDENTIDAD'
        };

        // 3. Fechas
        // La fecha de asignación es created_at. Formato ISO 8601
        $fechaAsignacion = $pqr->created_at->format('Y-m-d\TH:i:s');
        
        // Fecha estimada de respuesta (deadline_at)
        $fechaEstRespuesta = $pqr->deadline_at ? $pqr->deadline_at->format('Y-m-d') : date('Y-m-d');

        // 4. Mapeo de Estado (Tu BD -> Texto SIC)
        // Según Pág 109, Tabla 18. Mapea tus estados internos a los oficiales
        $estadoDescripcion = $this->mapEstado($pqr->status);

        // 5. Tipo de Queja SIC (Mapeo)
        // Debes definir qué código enviar según $pqr->type
        $codigoTipoQueja = '1'; // Ejemplo: Petición
        $nombreTipoQueja = strtoupper($pqr->type); 

        // Construcción del XML String
        // NOTA: No indentes el XML interno para evitar problemas de parsing en la SIC
        return <<<XML
<tns:ArrayOfIntegracionCUN xmlns:tns="http://ws.wso2.org/dataservice">
<tns:IntegracionCUN>
<tns:nombreOperador>INTALNET</tns:nombreOperador>
<tns:codigoUnicoNumerico>
<tns:identificadorOperador>{$io}</tns:identificadorOperador>
<tns:anoRadicacionCun>{$anio}</tns:anoRadicacionCun>
<tns:ConsecutivoRadCun>{$consecutivo}</tns:ConsecutivoRadCun>
</tns:codigoUnicoNumerico>
<tns:nomPersona>
<tns:primerNombre>{$nombres['primero']}</tns:primerNombre>
<tns:segundoNombre>{$nombres['segundo']}</tns:segundoNombre>
<tns:primerApellido>{$apellidos['primero']}</tns:primerApellido>
<tns:segundoApellido>{$apellidos['segundo']}</tns:segundoApellido>
</tns:nomPersona>
<tns:tipoldNacionalPersona>
<tns:codTipoldNacionalPersona>{$tipoIdSic}</tns:codTipoldNacionalPersona>
<tns:nomTipoldentificacionNacionalPersona>{$nombreTipoId}</tns:nomTipoldentificacionNacionalPersona>
</tns:tipoldNacionalPersona>
<tns:grupoNumeroldentificacion>{$pqr->document_number}</tns:grupoNumeroldentificacion>
<tns:descripcionEstado>{$estadoDescripcion}</tns:descripcionEstado>
<tns:fechaAsignacion>{$fechaAsignacion}</tns:fechaAsignacion>
<tns:fechaEstRespuesta>{$fechaEstRespuesta}</tns:fechaEstRespuesta>
<tns:razonSocial>INTALNET SAS</tns:razonSocial>
<tns:tipoQuejaSic>
<tns:nomTipoQuejaSic>{$nombreTipoQueja}</tns:nomTipoQuejaSic>
<tns:codTipoQuejaSic>{$codigoTipoQueja}</tns:codTipoQuejaSic>
</tns:tipoQuejaSic>
</tns:IntegracionCUN>
</tns:ArrayOfIntegracionCUN>
XML;
    }

    /**
     * XML de Error según esquema
     */
    private function buildErrorXml($code, $desc) {
        $timestamp = now()->format('Y-m-d\TH:i:s');
        return <<<XML
<tns:ArrayOfIntegracionCUN xmlns:tns="http://ws.wso2.org/dataservice">
<tns:MensajeServicio>
<CodigoError>{$code}</CodigoError>
<Descripcion>{$desc}</Descripcion>
<TimeStamp>{$timestamp}</TimeStamp>
</tns:MensajeServicio>
</tns:ArrayOfIntegracionCUN>
XML;
    }

    /**
     * Helper para separar nombres compuestos
     */
    private function separarNombres($nombreCompleto)
    {
        $partes = explode(' ', trim($nombreCompleto));
        $primero = $partes[0] ?? '';
        // Unir el resto como segundo nombre (si tiene 3 nombres, los 2 últimos van aquí)
        unset($partes[0]);
        $segundo = implode(' ', $partes);
        
        return ['primero' => $primero, 'segundo' => $segundo];
    }

    /**
     * Mapeo de estados de tu BD a los que espera la SIC
     */
    private function mapEstado($statusDb)
    {
        // Ajusta estos valores según lo que tengas en tu columna 'status'
        return match(strtolower($statusDb)) {
            'pendiente', 'radicado' => 'EN TRAMITE',
            'en proceso' => 'EN ANALISIS',
            'resuelto', 'cerrado' => 'RESUELTO',
            'anulado' => 'ANULADO',
            default => 'EN TRAMITE'
        };
    }
}