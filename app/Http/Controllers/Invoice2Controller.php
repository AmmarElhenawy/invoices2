<?php

namespace App\Http\Controllers;

use App\Models\section;
use App\Models\invoice2;
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
        return view('invoices.invoices');
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
        //
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
    public function getproducts($id)
    {
        $products = DB::table("products")->where("section_id", $id)->pluck("Product_name", "id");
        return json_encode($products);
    }
}
