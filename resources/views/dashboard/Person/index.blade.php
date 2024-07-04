@extends('dashboard.master')
@section('titulo','Personas')
@include('layouts/navigation')
@section('contenido')

<div class="container">
    <h1>Listado de Personas</h1>
    <br>
    <a href="{{ route('person.create') }}" class="btn btn-primary"><h1>Nueva Persona</h1></a>
    <table class="table table-dark table-striped" >
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo Persona</th>
                <th>Tipo de Documento</th>
                <th>Número de Documento</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($person as $person)
                <tr>
                    <td>{{ $person->name }}</td>
                    <td>{{ $person->type }}</td>
                    <td>{{ $person->document_type }}</td>
                    <td>{{ $person->document_number }}</td>
                    <td>{{ $person->email }}</td>
                    <td>
                        <a href="{{ route('person.show', $person->id) }}" class="btn btn-info">Detalle</a>
                        <a href="{{ route('person.edit', $person->id) }}" class="btn btn-warning"> <i class="bi bi-pencil">Editar</i></a>
                        <form action="{{ route('person.destroy', $person->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"> <i class="bi bi-eraser-fill">Borrar</i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection