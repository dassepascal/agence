<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- tom-select --}}
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <title>@yield('title') | Administration</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Agence</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          @php
              $route = request()->route()->getName();
          @endphp
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('admin.property.index') }}"
                @class(['nav-link', 'active' => str_contains($route, 'property.')])
                >Gestion des biens </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.option.index') }}"
                @class(['nav-link', 'active' => str_contains($route, 'option.')])
                >Gestion des options</a>
              </li>
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">Option</a>
              </li> --}}

            </ul>
          </div>
        </div>
      </nav>

    <div class="container mt-5">
        @php
        use Illuminate\Support\Facades\Session;
        @endphp
        <div id='open'>
            @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block d-flex  d-flex justify-content-between" >
                <div class="p-2 bd-highlight">
                    <strong>{{ $message }}</strong>
                </div>
                <div>
                    <button type="button" class="btn-close  " data-bs-dismiss="modal" aria-label="Close"
                        onclick="document.getElementById('open').style.display='none'" console.log('tesdt')></button>
                </div>
            </div>
            @endif

        </div>

        @yield('content')
    </div>
    {{-- tom-select --}}
<script>
    new TomSelect('select[multiple]',{plugins: {remove_button : {title: 'Supprimer'}}});

</script>
    {{-- bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"> </script>
</body>

</html>
