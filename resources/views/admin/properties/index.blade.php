@extends('admin.admin')

@section('title', 'Liste des biens')

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3">@yield('title')</h1>
    <a href="{{ route('admin.property.create') }}" class="btn btn-primary ">Ajouter un bien</a>
</div>

<table class="table table-striped">

    <thead>
        <tr>

            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class="text-end">Actions</th>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>

            <td>{{ $property->title }}</td>
            <td>{{ $property->surface }}</td>
            <td>{{ number_format( $property->price, thousands_separator: '')}}</td>
            <td>{{ $property->city }}</td>
            <td class="text-end">
                <a href="#" class="btn btn-primary">Modifier</a>
                <form action="#" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>


</table>

{{ $properties->links() }}

@endsection

