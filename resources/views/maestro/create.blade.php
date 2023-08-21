@extends('welcome')

@section('titulo', 'Crear Maestros')

@section('contenido')

<form action="/maestros" method="post">
    @csrf
    <div>
        <label for="" class="form-label">Código del Profesor</label>
        <input type="text" name="codigo" id="codigo" class="form-control">
        @error('matricula')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Nombre</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
        @error('nombre')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Apellido Paterno</label>
        <input type="text" name="apellidopaterno" id="apellidopaterno" class="form-control">
        @error('apellidopaterno')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Apellido Materno</label>
        <input type="text" name="apellidomaterno" id="apellidomaterno" class="form-control">
        @error('apellidomaterno')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div> <div>
        <label for="" class="form-label">Número del Seguro Social</label>
        <input type="text" name="NSS" id="NSS" class="form-control">
        @error('NSS')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <div>
        <label for="" class="form-label">Correo</label>
        <input type="email" name="correo" id="correo" class="form-control">
        @error('correo')
            <small style="color: red">{{$message}}</small>
        @enderror
    </div>
    <a href="/estudiantes" class="btn btn-danger text-light">Cancelar</a>
    <button type="submit" class="btn btn-success">Guardar</button>
</form>


@endsection