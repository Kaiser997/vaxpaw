@extends('plantillas.layout')

@section('title', 'Consulta de vacunas')

@section('content')

    <div class="container mt-5">
        <h1 class="text-center mb-4">Lista de vacunas aplicadas</h1>
        @if ($vaccunelist->isEmpty())
            <div class="alert alert-info" role="alert">
                No hay vacunas registradas.
            </div>
        @else
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr class="text-center">
                        <th>Usuario</th>
                        <th>Animal</th>
                        <th>Nombre vacuna</th>
                        <th>Descripcion</th>
                        <th>Dosis</th>
                        <th>Date</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vaccunelist as $animal)
                        <tr class="text-center">
                            <td>{{ $animal->animal->user->name }}</td>
                            <td>{{ $animal->animal->name }}</td><!--recupera el nombre del animal-->
                            <td>{{ $animal->name }}</td>
                            <td>{{ $animal->description }}</td>
                            <td>{{ $animal->dose }}</td>
                            <td>{{ date('Y-m-d', strtotime($animal->date)) }}</td>
                            <!--para formatear la fecha y quitar la hora-->
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm" href={{ url('editarvacuna/' . $animal->id) }}>Editar</a>
                                <a class="btn btn-danger btn-sm" href="#"
                                    onclick="event.preventDefault(); if (confirm('¿Estás seguro de eliminar este animal?')) { document.getElementById('delete-form-{{ $animal->id }}').submit(); }">
                                    Eliminar
                                </a>
                                <!--previene de enviar un dato sin confirmacion y se guarda con el id de delete-form--->

                                <!-- Formulario oculto para eliminar -->
                                <form id="delete-form-{{ $animal->id }}"
                                    action="{{ url('deletevaccune/' . $animal->id) }}" method="POST"
                                    style="display: none;">
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
    @endif
    @if (Session::has('success'))
        <script>
            alert("{{ Session::get('success') }}");
        </script>
    @endif
@endsection
