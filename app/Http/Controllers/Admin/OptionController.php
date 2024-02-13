<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OptionFormRequest;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $options = Option::paginate(5);
        return view('admin.options.index', [
            'options' => $options
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $option = new Option();
        //dd($option);
        return view('admin.options.form',[
            'option'=>$option
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OptionFormRequest $request, Option $option)
    {


        $option = Option::create($request->validated());

        return redirect()->route('admin.option.index')->with('success', 'L\'option  a bien été enregistré avec succès');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Option  $option)
    {
        return view('admin.options.form', ['option' => $option]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien été modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Option $option)
    {
        $option->delete();
        return redirect()->route('admin.option.index')->with('success', 'L\'option a bien été supprimé');
    }
}
