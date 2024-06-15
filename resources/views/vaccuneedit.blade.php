@extends('plantillas.layout')

@section('title','Editar vacuna')

@section('content')

<hr>

<div class="container mt-5">
    <h1 class="text-center mb-4">Editar vacuna</h1>
    @isset($vaccune)
    <!-- Formulario de edición del animal -->
        <form action="{{url('actualizarvacuna/'. $vaccune->id)}}" method="POST">
        @csrf
        @method('PUT')

        <!-- Campo Nombre -->
     
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $vaccune->name }}">
            </div>

            <!-- Campo Raza -->
            <div class="mb-3">
                <label for="description" class="form-label">Descripcion</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $vaccune->description }}">
            </div>

            <!-- Campo Edad -->
            <div class="mb-3">
                <label for="dose" class="form-label">Dosis</label>
                <input type="number" class="form-control" id="dose" name="dose" value="{{ $vaccune->dose }}">
            </div>
            
            <div class="mb-3">
                <label for="date" class="form-label">Fecha</label>
                <input type="date" class="form-control" id="date" name="date" value="{{ \Carbon\Carbon::parse($vaccune->date)->format('Y-m-d') }}">
            </div>

            <!-- Botón Actualizar -->
            <button type="submit" class="btn btn-primary mb-3">Actualizar</button>
            
        
        </form>
    @endisset
</div>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif
@endsection