@extends('admin.admin')

@section('name', $option->exists ? 'Editer une option' : 'Créer une option')

@section('content')


<h1 class="h3">@yield ('title')</h1>
<form class="vstack gap-2"
    action="{{ route($option->exists ? 'admin.option.update' : 'admin.option.store', $option) }}" method="post">
    @csrf
    @method($option->exists ? 'PUT' : 'POST')
    <div class="row row-cols-3">
        @include('shared.input', ['class' => 'col','label'=>'Nom','name'=>'name','value' => $option->name])
    </div>




    <button class="btn btn-primary mt-3">
        @if ($option->exists)
        Modifier
        @else
        Créer
        @endif
    </button>
</form>




@endsection
