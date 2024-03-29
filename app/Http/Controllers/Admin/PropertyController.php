<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view('admin.properties.index', [
        //     'properties' => Property::orderBy('created_at', 'desc')->paginate(25)->get(),
        // ]) ;
        $properties = Property::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.properties.index', [
            'properties' => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
        $property->fill([
           'surface' => 85,
           'bedrooms' => 1,
           'floor' => 1,
           'postal_code' => '75000',
           'city' => 'Paris',
           'solde' => false,
         ]);

        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {

        $property = Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été enregistré avec succès');

    }






    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id'),
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        //dd($request->validated());

//dd($property->options());
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        //dd($property->update($request->validated()));
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été modifie');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.property.index')->with('success', 'Le bien a bien été supprimé');
    }
}
