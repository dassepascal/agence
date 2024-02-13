@extends('base')

@section('title', $property->title)

@section('content')

<div class="container mt-2">
    <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m² </h2>

    <div class="text-primary fw-bold" style="font-size: 4rem; ">
        {{ number_format($property->price,thousands_separator:'') }} €
    </div>



    <hr>
    {{-- <div class="mt-4">
        <h4>Intéressé par ce bien</h4>
        @include('shared.flash')
        <form action="{{ route('property.contact',$property) }}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col','label' => 'Prénom', 'name' => 'firstname','value'=>'John' ])
                @include('shared.input', ['class' => 'col','label' => 'Nom', 'name' => 'name','value'=>'Doe' ])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'col','label' => 'Téléphone', 'name' => 'phone','value'=>'01 23 45 67 89'])
                @include('shared.input', ['class' => 'col','label' => 'Email', 'name' => 'email','value'=>'test@test.fr' ])
            </div>

            @include('shared.input', ['type' => 'textarea','class' => 'col','label' => 'Votre message', 'name' =>
            'message','value'=>'Je suis intéressé par votre bien '
            ])

            <button class="btn btn-primary mt-2">
                Nous contacter

            </button>
        </form>
    </div> --}}
    {{-- <div class="mt-4">
        <h2>Description</h2>
        <p>{{nl2br($property->description)}}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristiques</h2>
                <table class="table table-striped">
                    <tr>
                        <td>surface habitable</td>
                        <td>{{ $property->surface }} m²</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{ $property->rooms }}</td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{ $property->bedrooms }}</td>
                    </tr>
                    <tr>
                        <td>Etage</td>
                        <td>{{ $property->floor ? : 'Rez de chaussé'}}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>{{ $property->address}}<br>{{ $property->city}}<br>{{ $property->postal_code }}</td>

                    </tr>

                    </tr>
                </table>
            </div>
            <div class="col-4 ">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @forelse ($property->options as $option )
                    <li class="list-group-item">{{ $option->name }}</li>
                    @empty
                    <li class="list-group-item">Aucune option</li>
                    @endforelse
                </ul>

            </div>

        </div>
    </div> --}}
</div>

@endsection
