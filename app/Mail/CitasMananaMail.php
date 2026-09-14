<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;


class CitasMananaMail extends Mailable
{
    public $medico;
    public $fecha;
    public $pdf;

    public function __construct($medico, $fecha, $pdf)
    {
        $this->medico = $medico;
        $this->fecha = $fecha;
        $this->pdf = $pdf;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Citas programadas ' . $this->fecha,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.citas-consulta-externa-manana',
        );
    }

    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => $this->pdf->output(), 'citas_'.$this->fecha.'.pdf')
                ->withMime('application/pdf'),
        ];
    }
}
