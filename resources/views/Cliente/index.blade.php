@extends('base')

@section('contenido')


@isset($datos)
<div class="alert alert-{{$tipo}}" role="alert">
  {{ $mensaje }}
</div>
@endisset

<!-- Aqui va el listado -->

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Electronico</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Estado civil</th>
            <th>Sueldo Anual</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Fecha de Nacimiento</th>
            <th>Correo Electronico</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Estado civil</th>
            <th>Sueldo Anual</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->id}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->apellidos}}</td>
                <td>{{$cliente->nacimiento}}</td>
                <td>{{$cliente->correo}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->estadoCivil}}</td>
                <td>{{$cliente->sueldoAnual}}</td>
                <td><a href="{{url('cliente/' . $cliente ->id)}}" class="btn btn-info">Ver</a></td>
                <td><a href="{{url('cliente/' . $cliente ->id . '/edit')}}" class="btn btn-success">Editar</a></td>
                <td>
                    <form action="{{ url('cliente/' . $cliente->id) }}" method=post>
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar" class="btn btn-danger destroy"/>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="row">
    <a href="{{url('cliente/create')}}" class="btn btn-info">Agregar Cliente</a>
    <a href="{{action('ClienteController@create')}}" class="btn btn-info">Agregar Cliente</a>
</div>
<hr>

@stop