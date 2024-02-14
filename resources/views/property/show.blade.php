@extends('base')

@section('title', $property->title)

@section('content')

<div class="container mt-2">

    <h1>{{ $property->title }}</h1>
    <h2>{{ $property->rooms }} pièces - {{ $property->surface }} m² </h2>

    <div class="text-primary fw-bold" style="font-size: 4rem; ">
        {{ $property->formatted_price }}
    </div>

</div>

<hr>
<div class="container">
    <div class="mt-4">
        <h4>Intéressé par ce bien ?</h4>
        <form action="{{ route('property.contact',$property) }}" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class'=>'col', 'name'=>'lastname', 'label'=>'Votre nom','value'=>'Dasse'])
                @include('shared.input', ['class'=>'col', 'name'=>'firstname', 'label'=>'Votre prénom','value'=>'Pascal'])
            </div>
            <div class="row">
                @include('shared.input', ['class'=>'col', 'name'=>'phone', 'label'=>'Votre téléphone','value'=>'1234567897'])
                @include('shared.input', ['type'=> 'email','class'=>'col', 'name'=>'email', 'label'=>'Votre email','value'=>'pascaldasse@test.fr'])
            </div>

            @include('shared.input', ['type'=>'textarea','class'=>'col', 'name'=>'message', 'label'=>'Votre message','value'=>'Bonjour, je suis intéressé par votre bien '])


            <div>
                <button class="btn btn-primary">
                    Nous contacter
                </button>
            </div>
        </form>
    </div>
    <div class="mt-4">
        <p>{{ nl2br($property->description) }}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristiques</h2>
                <table class="table table-stripe">
                    <tr>
                        <td>Surface habitable</td>
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
                        <td>{{ $property->floor ? : 'rez de chaussé'}}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>
                            {{ $property->adress }} <br/></td>
                            <td>{{ $property->postal_code }} {{ $property->city }} </td>
                    </tr>

                </table>
            </div>
            <div class="col-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach ($property->options as $option )
                    <li class="list-group-item">{{ $option->name }}</li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>


@endsection
