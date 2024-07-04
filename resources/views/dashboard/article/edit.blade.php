@extends('dashboard.master')
@section('titulo','EditarArticulo')
@include('layouts/navigation')
@section('contenido')
<div class="container py-4">
  <form action="{{ route('article.store') }}" method="post">
    @csrf
    <div class="form-group row">
        <label for="code" class="col-sm-2 col-form-label">Codigo</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="code" id="code" placeholder="Ingresa el codigo del producto">
        </div>
    </div>
    <div class="form-group row">
        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="name" id="name" placeholder="Ingresa el Nombre del producto">
        </div>
    </div>
    <div class="form-group row">
        <label for="Category" class="col-sm-2 col-form-label">Categoria</label>
        <div class="col-sm-10">
            <select name="category" id="category" class="form-select" required >
                <option value="">Seleccionar Categoria</option>
                @foreach($category as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="Sale_Price" class="col-sm-2 col-form-label">Precio Venta</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="Sale_Price" id="Sale_Price" value="{{$article->Sale_Price}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="stock" class="col-sm-2 col-form-label">Cantidad Disponible(Stock)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="stock" id="stock" placeholder="Ingresa la cantidd disponible">
        </div>
    </div>
    <div class="form-group row">
        <label for="description">Descripcion</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="description" id="description"></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label for="state">Estado</label>
        <div class="col-sm-10">
            <select class="form-control" name="state" id="state">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <div class="col-sm-10 offset-sm-2">
           <button type="submit" class="btn btn-success">Registrar</button>
           <a href="{{url('dashboard/category')}}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
  </form>  
</div>

@endsection