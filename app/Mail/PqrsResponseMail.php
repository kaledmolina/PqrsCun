<?php

namespace App\Mail;

use App\Models\Pqrs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class PqrsResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    public $pqrs;
    public $responseContent;
    public $attachmentPaths;
    public $subjectLine;

    /**
     * Create a new message instance.
     */
    public function __construct(Pqrs $pqrs, string $content, array $attachmentPaths = [], string $subjectLine = 'Respuesta a su solicitud PQR')
    {
        $this->pqrs = $pqrs;
        $this->responseContent = $content;
        $this->attachmentPaths = $attachmentPaths;
        $this->subjectLine = $subjectLine;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address('servicioalcliente@intalnet.com', 'Servicio al Cliente Intalnet'),
            subject: $this->subjectLine . ' - ' . $this->pqrs->cun,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.pqrs-response',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $mailAttachments = [];

        foreach ($this->attachmentPaths as $path) {
            // Use local disk path
            $fullPath = storage_path('app/private/' . $path);
            if (file_exists($fullPath)) {
                $mailAttachments[] = Attachment::fromPath($fullPath);
            }
        }

        return $mailAttachments;
    }
}
