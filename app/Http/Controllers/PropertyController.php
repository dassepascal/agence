<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {

         $query = Property::query()->orderBy('created_at', 'DESC')->with('options');
        if($price = $request->validated('price')){
           $query = $query->where('price', '<=', $price);
        }
        if($surface = $request->validated('surface')){
            $query = $query->where('surface', $surface);
        }
        if($rooms = $request->validated('rooms')){
            $query = $query->where('rooms', $rooms);
        }
        if($title = $request->validated('title')){
            $query = $query->where('title','like', "%{$title} %");
        }


        return view('property.index',[
             'properties' => $query->paginate(2),
             'input'=> $request->validated()

        ]);
    }


    public function show(string $slug, Property $property)
    {
        $property= Property::where('slug', $slug)->firstOrFail();
//dd($slug, $property);
        if($slug !== $property->slug){
            return to_route('property.show', [
                'slug'=>$property->slug,
                'property'=>$property
            ]);
        }

        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(PropertyContactRequest $request, Property $property)
    {

        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('message', 'Votre email a bien été envoyé');
    }


}
