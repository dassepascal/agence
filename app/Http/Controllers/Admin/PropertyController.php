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
        return view('admin.properties.index',[
            'properties' => $properties
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property = new Property();
return view('admin.properties.form',['property' => $property]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
       $request->validated();
         $property = new Property();
            $property->name = $request->name;
            $property->description = $request->description;
            $property->price = $request->price;
            $property->bedrooms = $request->bedrooms;
            $property->floor = $request->floor;
            $property->price = $request->price;
            $property->rooms = $request->rooms;
            $property->surface = $request->surface;
            $property->city = $request->city;
            $property->adress = $request->adress;
            $property->postal_code = $request->postal_code;
            $property->sold = $request->sold;
            $property->save();
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
