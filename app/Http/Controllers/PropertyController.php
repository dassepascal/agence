<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {

        // $query = Property::query();
        // if($price =$request->validated('price')){
        //    $query = $query->where('price', '<=', $price);
        // }
        // if($surface = $request->validated('surface')){
        //     $query = $query->where('surface', '<=', $surface);
        // }
        // if($rooms = $request->validated('rooms')){
        //     $query =   $query->where('rooms', '<=', $rooms);
        // if($title = $request->validated('title')){
        //     $query =  $query->where('title', 'like', "%{ $title}%");
        // }
        $properties = Property::paginate(2);

        return view('property.index',[
             'properties' => $properties,
            // 'input'=> $request->validated()

        ]);
    }


    public function show(string $slug, Property $property)
    {

        $property = Property::where('slug', $slug)->first();
        //dd($property);
        return view('property.show', ['property' => $property]);
    }


}