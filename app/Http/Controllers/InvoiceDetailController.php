<?php

namespace App\Http\Controllers;

use App\Models\invoice2;
use App\Models\section;
use App\Models\products;
// use App\Models\invoice_details;
use App\Models\invoice_details;

use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // جلب القسم المطلوب بناءً على المعرف
        $section = Section::find($id);

        // التحقق من وجود القسم
        if (!$section) {
            return redirect()->back()->withErrors(['error' => 'القسم غير موجود']);
        }

        // جلب بيانات التفاصيل والفاتورة بناءً على القسم
        $invoiceDetail = InvoiceDetail::where('section', $id)->first();
        $invoice = Invoice2::where('section_id', $id)->first();

        // التحقق من وجود بيانات الفاتورة والتفاصيل
        if (!$invoiceDetail || !$invoice) {
            return redirect()->back()->withErrors(['error' => 'التفاصيل أو الفاتورة غير موجودة']);
        }

        // استخراج الحقول المطلوبة
        $sec_name = $section->section_name;
        $desc = $invoiceDetail->status;
        $cr_by = $invoice->invoice_number;

        // <samir code>
        // $sec_name = invoice2::where('id',$id)->first();
        // $desc  = InvoiceDetail::where('id_Invoice',$id)->get();
        // $cr_by  = invoices_attachment::where('invoice_id',$id)->get();
        // <samir>


        // تمرير المتغيرات إلى العرض
        return view('invoices.invoiceDetail', compact('sec_name', 'desc', 'cr_by'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InvoiceDetail $invoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InvoiceDetail $invoiceDetail)
    {
        //
    }
}
