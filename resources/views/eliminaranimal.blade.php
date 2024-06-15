@extends('plantillas.layout')

@section('title','Agregar animal')

@section('content')
<hr>
<hr>

<div class="container card">
    <div class="animal-list">
        @isset($animals)
            @foreach($animals as $animal)
                <div class="animal-item d-flex justify-content-between">
                    <p>{{ $animal->name }}</p>
                    <form method="POST" action="{{ url('deleteanimal/'. $animal->id) }}" class="ms-3">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </div>
            @endforeach
        @endisset
    </div>
</div>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif

<br>
<br>
<hr>
<hr>


@endsection
