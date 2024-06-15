@extends('plantillas.layout')

@section('title','Consultar animales')

@section('content')
<hr>

<div class="container mt-5">
        <h1 class="text-center mb-4">Lista de Animales</h1>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>User ID</th>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Edad</th>
                    <th>Sexo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($animallist as $animal)
                    <tr class="text-center">
                        <td>{{ $animal->user->name }}</td>
                        <td>{{ $animal->name }}</td>
                        <td>{{ $animal->race }}</td>
                        <td>{{ $animal->age }}</td>
                        <td>{{ $animal->sex }}</td>
                        <td class="text-center">
                            <a  class="btn btn-primary btn-sm" href={{url ('editaranimal/'. $animal->id)}}>Editar</a>
                            <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault(); if (confirm('¿Estás seguro de eliminar este animal?')) { document.getElementById('delete-form-{{ $animal->id }}').submit(); }">
                                Eliminar
                            </a>
                            
                            <!-- Formulario oculto para eliminar -->
                            <form id="delete-form-{{ $animal->id }}" action="{{ url('deleteanimal/'. $animal->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif
@endsection