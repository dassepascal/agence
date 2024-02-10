<?php

namespace App\Http\Controllers\Admin;

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
        $properties = Property::orderBy('created_at', 'desc')->paginate(25);
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

           'surface'=>85,
            'bedrooms' => 1,
           'floor' => 1,
           'postal_code' => '75000',
              'city' => 'Paris',
              'solde' => false,


        ]);
        return view('admin.properties.form', ['property' => $property]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        return redirect()->route('admin.property.index')->with('message', 'Property created successfully');

    }






    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
