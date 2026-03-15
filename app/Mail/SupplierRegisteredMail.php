<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupplierRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    public $supplier;

    public function __construct($supplier)
    {
        $this->supplier = $supplier;
    }

    public function build()
    {
        return $this->subject('New Supplier Registration - '.$this->supplier->supplier_name)->view('emails.supplier-registered')->with('supplier',$this->supplier);
    }
}
