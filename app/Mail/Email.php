<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    public function build()
    {
        return $this->subject('Isi')
            ->view('email')
            ->with(
                [
                    'details' => $this->details,
                ]
            )
            ->attach(public_path('pdf/nama.pdf'), [
                'as' => 'NS-Detail PO.pdf',
                'mime' => 'application/pdf'
            ]);
    }
}
