@extends('welcome')

@section('titulo', 'Ver Profesores')


    <h1 class="my-3"> CRUD BÁSICO PARA MAESTROS</h1>
    <br>
    <a href="maestros/create" class="btn btn-primary"> Crear </a>
    <table>
        <thead>
            <tr>
                <th class="text-light" scope="col">ID</th>
                <th class="text-light" scope="col">Codigo</th>
                <th class="text-light" scope="col">Nombre</th>
                <th class="text-light" scope="col">Apelligo Paterno</th>
                <th class="text-light" scope="col">Apellido Materno</th>
                <th class="text-light" scope="col">NSS</th>
                <th class="text-light" scope="col">Correo</th>
                <th class="text-light" scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($maestros as $maestro)
                <tr>
                    <td>{{$maestro->matricula}}</td>
                        <td>{{$maestro->nombre}}</td>
                        <td>{{$maestro->apellidopaterno}}</td>
                        <td>{{$maestro->apellidomaterno}}</td>
                        <td>{{$maestro->correo}}</td>
                        <td>
                            <form action="{{route ('maestros.destroy',$maestro->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="/maestros/{{$maestro->id}}/edit" class="btn btn-warning">Editar</a>
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>