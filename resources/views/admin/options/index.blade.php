@extends('admin.admin')

@section('title', 'Liste des options')

@section('content')

<div class="d-flex justify-content-between align-items-center">


    <h1 class="h3">@yield('title')</h1>
    <a href="{{ route('admin.option.create') }}" class="btn btn-primary ">Ajouter une option</a>
</div>

<table class="table table-striped">

    <thead>
        <tr>

            <th>Name</th>

            <th class="text-end">Actions</th>
    </thead>
    <tbody>
        @foreach($options as $option)
        <tr>

            <td>{{ $option->name }}</td>

            <td>
                <div class="d-flex gap-2 w-100 justify-content-end">
                    <a href="{{ route('admin.option.edit',$option) }}" class="btn btn-primary">Editer</a>
                    <button type="button" class="btn btn-danger"
                    onclick="document.getElementById('model-open').style.display='block'"

                        >Supprimer</button>
                    <form action="{{ route('admin.option.destroy',$option) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <div class="modal" tabindex="-1" id="model-open">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title">La suppression d'un élément est définifive </h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                  onclick="document.getElementById('model-open').style.display='none'"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                  <p>Etes-vous sur de vouloir supprimer cette élément ?</p>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                  onclick="document.getElementById('model-open').style.display='none'"
                                  >Annuler</button>
                                  <button type="submit" class="btn btn-primary">oui</button>
                                </div>
                              </div>
                            </div>
                          </div>

                    </form>
                </div>

            </td>
        </tr>
        @endforeach
    </tbody>


</table>

{{ $options->links() }}

@endsection

