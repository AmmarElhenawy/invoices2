<?php

namespace App\Http\Controllers;

use App\Models\invoiceArchive;
use Illuminate\Http\Request;
use App\Models\invoice2;


class InvoiceArchiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice= invoice2::onlyTrashed()->get();
        return view('invoices.invoiceArchive',compact('invoice'));
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
    public function show(invoiceArchive $invoiceArchive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoiceArchive $invoiceArchive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoiceArchive $invoiceArchive)
    {
        $id=$request->id;
        $invoice= invoice2::withTrashed()->where('id',$id)->restore();
        session()->flash('status','تم تغيير ارجاع الحاله بنجاح');
        return redirect('invoiceArchive');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $invoice= invoice2::withTrashed()->where('id',$id)->forceDelete();
        session()->flash('delete','تم الحزف ');
        return redirect('invoiceArchive');
    }
}
