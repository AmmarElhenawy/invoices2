<?php

namespace App\Http\Controllers;
use App\Models\section;
use App\Models\products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $section=section::all();
        return view('products.products',compact('section'));
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
        $validated = $request->validate([
            'product_name' => 'required|unique:products|max:255',
            'section_name' => 'required|unique:sections',
        ],[
            'section_name.unique'=>'القسم مسجل مسبقا',
            'section_name.required'=>'يرجي ادخال القسم',
            'product_name.required'=>'يرجي ادخال القسم',
        ]);
        products::create([
            'product_name' => $request->product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()-> flash('add','تم اضافه المنتج بنجاح');
        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(products $products)
    {
        //
    }
}
