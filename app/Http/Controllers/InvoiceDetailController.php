<?php

namespace App\Http\Controllers;

use App\Models\invoice2;
use App\Models\invoices_attachment;

use Illuminate\Support\Facades\Storage;

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
        //{first} bec just one row one inv id
        //can search by inv without loop
        $inv=invoice2::where('id',$id)->first();

        //{get} bec invoice id will have more than one details/attachmen id
        //must be in loop like foreach
        $inv_details=InvoiceDetail::where('id_invoice',$id)->get();
        $inv_attachment=invoices_attachment::where('invoice_id',$id)->get();



        // <samir code>
        // $sec_name = invoice2::where('id',$id)->first();
        // $desc  = InvoiceDetail::where('id_Invoice',$id)->get();
        // $cr_by  = invoices_attachment::where('invoice_id',$id)->get();
        // <samir>


        // تمرير المتغيرات إلى العرض
        return view('invoices.invoiceDetail', compact('inv', 'inv_details', 'inv_attachment'));
        // return $id;
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
    public function destroy(Request $request)
    {
        $invoices =invoices_attachment::findOrFail($request->id);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function view_attach($invoice_number, $file_name)
    {
        $filePath = "$invoice_number/$file_name";

        if (Storage::disk('public_uploads')->exists($filePath)) {
            return response()->file(Storage::disk('public_uploads')->path($filePath));
        } else {
            return abort(404, 'File not found.');
        }
    }


    public function download_attach($invoice_number, $file_name)
    {
        $filePath = Storage::disk('public_uploads')->path("$invoice_number/$file_name");

        if (Storage::disk('public_uploads')->exists("$invoice_number/$file_name")) {
            return response()->download($filePath);
        } else {
            return abort(404, 'File not found.');
        }
    }
}
