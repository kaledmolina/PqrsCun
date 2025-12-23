<?php

namespace App\Console\Commands;

use App\Mail\PqrsResponseMail;
use App\Models\Pqrs;
use App\Services\PqrsResponseService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class TestPqrsResponse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pqrs:test-response {input? : ID or CUN of the PQR} {email? : Email to send the test to}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a test PDF response and send it to a specified email';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $input = $this->argument('input');
        $email = $this->argument('email');

        // 1. Ask for PQR Identifier if missing
        if (!$input) {
            $input = $this->ask('Por favor, ingresa el ID o CUN de la PQR a probar');
        }

        // Try to find by ID first, then CUN
        $pqrs = Pqrs::find($input);
        if (!$pqrs) {
            $pqrs = Pqrs::where('cun', $input)->first();
        }

        if (!$pqrs) {
            $this->error("No se encontró ninguna PQR con el criterio: $input");
            return;
        }

        $this->info("PQR encontrada: {$pqrs->cun} - {$pqrs->first_name} {$pqrs->last_name}");
        $this->warn("Estado actual: {$pqrs->status}");

        // 2. Ask for Email if missing
        if (!$email) {
            $email = $this->ask('¿A qué correo quieres enviar la prueba?', $pqrs->email);
        }

        $this->info("Iniciando generación de documentos...");

        $service = new PqrsResponseService();

        // 3. Generate Content (Dummy content for test)
        // Use the proper template based on PQR type or default to 'peticion'
        $type = $pqrs->type ?? 'peticion';
        if ($type === 'queja' || $type === 'reclamo') $type = 'queja_reclamo';
        
        // We inject a dummy response body for testing purposes
        // This simulates what the PqrsResponseService typically does inside getOfficialResponseTemplate
        // but since getOfficialResponseTemplate calculates placeholders internally, we just call it directly.
        $content = $service->getOfficialResponseTemplate($pqrs, $type);
        
        // Note: The service might have empty placeholders like [ESCRIBA AQUÍ...]. 
        // For distinct visualization, let's just use what the service returns.

        $this->line("Generando PDF...");

        try {
            // 4. Generate PDF
            $pdfPath = $service->generatePdf($content, $pqrs);
            $this->info("PDF generado correctamente en: $pdfPath");

            // 5. Send Email
            $expectedPath = storage_path('app/public/' . $pdfPath);
            $this->info("Ruta esperada del adjunto para el correo: $expectedPath");
            
            if (!file_exists($expectedPath)) {
                $this->error("¡ALERTA! El archivo no existe en la ruta esperada. El correo se enviará sin adjunto.");
            } else {
                $this->info("El archivo existe y está listo para adjuntarse.");
            }

            $this->line("Enviando correo a: $email...");
            
            Mail::to($email)->send(new PqrsResponseMail(
                $pqrs,
                $content,
                [$pdfPath], // Attachments array
                'PRUEBA DE RESPUESTA PQR - ' . $pqrs->cun
            ));

            $this->info("¡Correo enviado exitosamente!");
            $this->newLine();
            $this->line("Verifica la bandeja de entrada de: $email");
            $this->line("El PDF debe estar adjunto y la contraseña es: " . ($pqrs->document_number ?? 'N/A'));

        } catch (\Exception $e) {
            $this->error("Ocurrió un error: " . $e->getMessage());
            $this->line($e->getTraceAsString());
        }
    }
}
