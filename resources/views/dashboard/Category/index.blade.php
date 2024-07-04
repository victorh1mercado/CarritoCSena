@extends('dashboard.master')
@section('titulo','Categoria')
@include('layouts/navigation')
@section('contenido')
<main>
    <div class="container py-4">
        <h2>Categorias Productos</h2>
        <br>
        <a href="{{ url('dashboard/category/create') }}" class="btn btn-primary btn-sm">Nueva categoria</a>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th>ID Categoria</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Estado</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $category)
                <tr>
                    <td scope="row">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->state ? __('activo') : __('inactivo') }}</td>
                    <td>
                    <a href="{{ url('dashboard/category/'.$category->id.'/edit') }}" class="bi bi-pencil"></a>
                    </td>
                    <td>
                    <form action="{{ url('dashboard/category/'.$category->id) }}" method="post">
                            @method("DELETE")
                            @csrf
                            <button class="bi bi-eraser-fill" type="submit" ></button>                                
                        </form>
                    </td>

                </tr>
                <tr>
                    <td scope="row"></td>
                    <td></td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
  

    </div>
</main>

@endsection