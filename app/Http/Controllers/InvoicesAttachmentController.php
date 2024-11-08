<?php

namespace App\Http\Controllers;
use App\Models\invoice2;
use Illuminate\Support\Facades\Auth;
use App\Models\invoices_attachment;
use Illuminate\Http\Request;

class InvoicesAttachmentController extends Controller
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
        $image=$request->file('file_name');
        $file_name=$image->getClientOriginalName();
        $invoice_number=$request->invoice_number;
        $invoice_id=$request->invoice_id;
        $attach=new invoices_attachment();
        $attach->file_name=$file_name;
        $attach->invoice_number=$invoice_number;
        $attach->invoice_id=$invoice_id;
        $attach->create_by=(Auth::user()->name);
        $attach->save();

        $imageName=$request->file_name->getClientOriginalName();
        // $request->pic->move(public_path('attachments/',$invoice_number),$imageName);
        $image->move(public_path("attachments/$invoice_number"), $imageName);

        session()->flash('Add', 'تم اضافة المرفق بنجاح');
        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(invoices_attachment $invoices_attachment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoices_attachment $invoices_attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoices_attachment $invoices_attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoices_attachment $invoices_attachment)
    {
        //
    }
}
