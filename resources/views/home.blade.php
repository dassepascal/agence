@extends('base')

@section('title', "Bienvenue sur notre site d'agence immobilière")

@section('content')
<div class="bg-light p-5 text-center">
    <div class="container">
        <h1>Agence lorem ipsum</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi ratione laboriosam quis esse beatae, ducimus voluptate rem voluptas facere voluptates autem libero praesentium molestias ullam possimus at? Quia, ipsa molestiae.</p>
    </div>
</div>
<div class="container">
    <h2>Nos derniers biens</h2>
    <div class="row">
        @foreach ($properties as $property )
        <div class="col">
            @include('property.card')
            
        </div>

        @endforeach
    </div>
</div>

@endsection
