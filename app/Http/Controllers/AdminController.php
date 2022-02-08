<?php

namespace App\Http\Controllers;

use App\Repositories\InvoiceRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return response()->view('adminIndex');
    }

    public function takeUserInvoice(Request $request, InvoiceRepository $invoiceRepository)
    {
        $inv =$invoiceRepository->getInvoice($request->invoiceNumber);
        $invoice = $inv->user_id->findInvoice($inv->invoice_id);
        return response(['invoice'=>$invoice]);
    }
    public function takeUserInvoicesShow()
    {
       return response()->view('invoices');
    }
}
