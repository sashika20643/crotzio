<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class invoice extends Mailable
{
    use Queueable, SerializesModels;
    public $total;
    public $productorder;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($total,$productorder)
    {
        $this->total=$total;
        $this->productorder=$productorder;
    }



    public function build()
    {
        return $this->view('email.invoice') ->subject('Invoice(crotzio)');
    }
}
