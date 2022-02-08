<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    public function getInvoice(string $invoice_number)
    {
        $invoice = Invoice::where('invoice_number',$invoice_number)->first();
        $invoice->user_id = $invoice->user;
        return $invoice;
    }

    public function create(array $data)
    {
        return Invoice::create($data);
    }
}
