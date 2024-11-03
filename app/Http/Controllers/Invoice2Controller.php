<?php

namespace App\Http\Controllers;

use App\Models\invoices_attachment;
use App\Models\section;
use App\Models\invoice2;
use App\Models\invoiceDetail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

class Invoice2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoice=invoice2::all();
        return view('invoices.invoices',compact('invoice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections=section::all();
        return view('invoices.add-invoices',compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all()); // تحقق من وصول كافة البيانات

        // $request->validate([
        //     'section_id' => 'required|exists:sections,id', // تأكد من أن القسم موجود
        // ]);
        invoice2::create([
            'invoice_number' => $request->invoice_number,
            'invoice_date' => $request->invoice_Date,
            'due_date' => $request->Due_date,
            'section_id' => $request->section_id,
            'product' => $request->product_id,
            'amount_collection' => $request->Amount_collection,
            'amount_commission' => $request->Amount_Commission,
            'discount' => $request->Discount,
            'rate_vat' => $request->Rate_VAT,
            'value_vat' => $request->Value_VAT,
            'total' => $request->Total,
            'status' => 'غير مدفوعه',//defult
            'value_status' => 2,//search by it
            'note' => $request->note,
        ]);
        $invoice_id=invoice2::latest()->first()->id;
        invoiceDetail::create([
            'id_invoice' => $invoice_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product_id,
            'section' => $request->section_id,
            'status' =>  'غير مدفوعه',
            'value_status'=>2,
            'note' => $request->note,
            'user'=> (Auth::user()->name),
        ]);
        if ($request->hasFile('pic')) {
        $invoice_id=invoice2::latest()->first()->id;
            $image=$request->file('pic');
            $file_name=$image->getClientOriginalName();
            $invoice_number=$request->invoice_number;
            $attach=new invoices_attachment();
            $attach->file_name=$file_name;
            $attach->invoice_number=$invoice_number;
            $attach->invoice_id=$invoice_id;
            $attach->create_by=(Auth::user()->name);
            $attach->save();

            $imageName=$request->pic->getClientOriginalName();
            // $request->pic->move(public_path('attachments/',$invoice_number),$imageName);
            $image->move(public_path("attachments/$invoice_number"), $file_name);
        }
        session()-> flash('add','تم اضافه المنتج بنجاح');
        return redirect('invoices');
    }

    /**
     * Display the specified resource.
     */
    public function show(invoice2 $invoice2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(invoice2 $invoice2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, invoice2 $invoice2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(invoice2 $invoice2)
    {
        //
    }
    // public function getproducts($id)
    // {
    //     $products = DB::table("products")->where("section_id", $id)->pluck("product_name", "id");
    //     return json_encode($products);
    // }
    public function getproducts($id)
{
    $products = DB::table("products")->where("section_id", $id)->pluck("product_name", "id");
    return response()->json($products);
}

}
