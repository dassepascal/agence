@extends('base')

@section('title', "Tous les biens immobiliers")

@section('content')

<div class="bg-light p-5 mb-5 text-center">
    <form action="" method="get" class="container d-flex gap-2">
        <input type="number" placeholder="Budget max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
        <input type="number" placeholder="Surface min" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
        <input type="number" placeholder="Nombre de pièce min " class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
        <input  placeholder="Mot clef" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
        <button class="btn btn-primary">
            Rechercher
        </button>

    </form>
</div>

<div class="container mt-2">
    <div class="row ">
        @forelse ($properties as $property )
        <div class="col-3 mb-4">
            @include('property.card')
        </div>
        @empty
        <div class=" col-12  bg-success text-center
        ">
          Aucun bien immobilier trouvé
        </div>

        @endforelse
    </div>



    <div class="my-4">
        {{ $properties->links() }}
    </div>



</div>


@endsection
