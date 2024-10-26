<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sec=section::all();
        return view(
                'section.section',compact('sec')
        );
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
            'section_name' => 'required|unique:sections|max:255',
            'description' => 'required',
        ],[
            'section_name.unique'=>'القسم مسجل مسبقا',
            'section_name.required'=>'يرجي ادخال القسم',
            'description.required'=>'يرجي ادخال وصف ',
        ]);

        // $input=$request->all();
        // $b_exist=section::where('section_name','=',$input['section_name'])->exists();
        // if ($b_exist) {
        //     session()->flash('error',"القسم موجود سابقا");
        //     return redirect('/sections');
        // }
        // else{
            section::create([
                'section_name'=>$request->section_name,
                'description'=>$request->description,
                'created_by'=>(auth::user()->name)
            ]);
            session()->flash('add','تم اضافه القسم ');
            return redirect('/sections');
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $validated2 = $request->validate([
            'section_name' => 'required|max:255'.$id,
            'description' => 'required',
        ],[
            'section_name.unique'=>'القسم مسجل مسبقا',
            'section_name.required'=>'يرجي ادخال القسم',
            'description.required'=>'يرجي ادخال وصف ',
        ]);
        $sec=section::find($id);
            $sec->update([
                'section_name'=>$request->section_name,
                'description'=>$request->description
            ]);
            session()->flash('edit','تم تعديل القسم ');
            return redirect('/sections');
        }


        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Request $request)
        {
            $id=$request->id;
            section::find($id)->delete();
            session()->flash('delete','تم حزف القسم ');
            return redirect('/sections');
        }
    }


