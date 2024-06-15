@extends('plantillas.layout')

@section('title','Consulta citas')

@section('content')
<hr>

<div class="container mt-5">
    <h1 class="text-center mb-4">Lista de Citas</h1>

    @if ($appointments->isEmpty())
        <div class="alert alert-info" role="alert">
            No hay citas registradas.
        </div>
    @else
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr class="text-center">
                    <th>Usuario</th>
                    <th>Animal</th>
                    <th>Nombre de la Cita</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                    <tr class="text-center">
                        <td>{{ $appointment->animal->user->name }}</td><!-- Nombre del usuario -->
                        <td>{{ $appointment->animal->name }}</td><!-- Nombre del animal -->
                        <td>{{ $appointment->name }}</td><!-- Nombre de la cita -->
                        <td>{{ $appointment->description }}</td><!-- Descripción -->
                        <td>{{ date('Y-m-d', strtotime($appointment->date)) }}</td><!-- Fecha -->
                        <td class="text-center">
                            <a href="{{ url('editappointment/' . $appointment->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault(); if (confirm('¿Estás seguro de eliminar esta cita?')) { document.getElementById('delete-form-{{ $appointment->id }}').submit(); }">
                                Eliminar
                            </a>
                            
                            <!-- Formulario oculto para eliminar -->
                            <form id="delete-form-{{ $appointment->id }}" action="{{ url('deleteappointment/' . $appointment->id) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

</div>

@if(Session::has('success'))
    <script>
        alert("{{ Session::get('success') }}");
    </script>
@endif
@endsection






