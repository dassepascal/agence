@extends('admin.admin')

@section('title', $property->exists ? 'Editer un bien' : 'Créer un bien')

@section('content')


<h1 class="h3">@yield ('title')</h1>
<form class="vstack gap-2"
    action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', $property) }}"
    method="post">



    @csrf

    @method($property->exists ? 'PUT' : 'POST')


    <div class="row row-cols-3">
        @include('shared.input', ['class' => 'col','label'=>'Titre','name'=>'title','value' => $property->title])
        @include('shared.input', ['class' => 'col','label'=>'Surface','name'=>'surface','value' =>
        $property->surface])
        @include('shared.input', ['class' => 'col','label'=>'Prix','name'=>'price','value' => $property->price])

    </div>
    @include('shared.input', ['type' => 'textarea','name'=>'description','value' => $property->description])
    <div class=" row row-cols-3">
        @include('shared.input', ['class' => 'col','label'=>'Piéces','name'=>'rooms','value' => $property->rooms])
        @include('shared.input', ['class' => 'col','label'=>'Chambres','name'=>'bedrooms','value' =>
        $property->bedrooms])
        @include('shared.input', ['class' => 'col','label'=>'Étages','name'=>'floor','value' => $property->floor])
    </div>
    <div class=" row row-cols-3">
        @include('shared.input', ['class' => 'col','label'=>'Adresse','name'=>'adress','value' =>
        $property->adress])
        @include('shared.input', ['class' => 'col','label'=>'Ville','name'=>'city','value' => $property->city])
        @include('shared.input', ['class' => 'col','label'=>'Code Postal','name'=>'postal_code','value' =>
        $property->postal_code])
    </div>
    {{-- @include('shared.checkbox', ['name'=>'sold','label'=>'Vendu','value' => $property->sold]) --}}

    <button class="btn btn-primary mt-3">
        @if ($property->exists)
        Modifier
        @else
        Créer
        @endif
    </button>
</form>






</form>
</div>
@endsection
