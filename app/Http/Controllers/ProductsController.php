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
        $prod=products::all();
        $section=section::all();
        return view('products.products',compact('section','prod'));
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
            'section_id' => 'required',
        ],[
            'section_id.required'=>'يرجي ادخال القسم',
            'section_id.exists'=>'القسم غير مجود',
            'product_name.required'=>'يرجي ادخال المنتج',
            'product_name.unique'=>'اسم المنتج مسجل سابقا',
        ]);
        products::create([
            'product_name' => $request->product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);
        session()-> flash('add','تم اضافه المنتج بنجاح');
        return redirect('products');

        // return $request;
        // return $request->all();

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
    public function update(Request $request)
    {
        // $id search with id so where secName = $request->secName
        $id = section::where('section_name', $request->section_name)->first()->id;

        $Products = products::findOrFail($request->id);

        $Products->update([
        'product_name' => $request->product_name,
        'description' => $request->description,
        'section_id' => $id,
        ]);

        session()->flash('edit', 'تم تعديل المنتج بنجاح');
        return back();
    }

    /**  
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $prodD=products::findOrFail($request->id);
        $prodD->delete();
        session()->flash('delete','تم حزف القسم ');
        return redirect('/products');
    }
}
