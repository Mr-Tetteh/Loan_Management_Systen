<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $loan;

    public function __construct($payment, $loan)
    {
        $this->payment = $payment;
        $this->loan = $loan;
    }

    public function build()
    {
        return $this->subject('Monthly Payment Receipt')
            ->view('Monthly_payment');
    }
}
