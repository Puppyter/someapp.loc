<?php

namespace App\Repositories;

use App\Models\Invoice;

class InvoiceRepository
{
    public function getInvoice(string $invoice_number)
    {
        return Invoice::where('invoice_number',$invoice_number)->get()->user;
    }

    public function create(array $data)
    {
        return Invoice::create($data);
    }
}
