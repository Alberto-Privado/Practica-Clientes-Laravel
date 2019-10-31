@extends('base')

@section('contenido')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<!-- Aqui va el listado -->

<form action="{{ url('cliente/' . $cliente->id) }}" method="post" enctype="application/x-www-form-urlencoded">
    {{method_field('PUT')}}
    @csrf
    <table class="table table-striped table-hover">
        <tr>
            <td>
                ID
            </td>
            <td>
                {{ $cliente-> id }}
            </td>
        </tr>
        <tr>
            <td>
                Nombre
            </td>
            <td>
                <input type="text" name="nombre" placeholder="Nombre" maxlength="100" required value="{{ old('nombre', $cliente->nombre) }}">
            </td>
        </tr>
        <tr>
            <td>
                Apellidos
            </td>
            <td>
                <input type="text" name="apellidos" placeholder="Apellidos" maxlength="200" required value="{{ old('apellidos', $cliente->apellidos) }}">
            </td>
        </tr>
        <tr>
            <td>
                Fecha Nacimiento
            </td>
            <td>
                <input type="date" name="nacimiento" placeholder="Fecha de Nacimiento" required value="{{ old('nacimiento', $cliente->nacimiento) }}">
            </td>
        </tr>
        <tr>
            <td>
                Correo Electronico
            </td>
            <td>
                <input type="email" name="correo" placeholder="Correo Electrónico" maxlength="400" required value="{{old('correo', $cliente->correo)}}">
            </td>
        </tr>
        <tr>
            <td>
                Telefono
            </td>
            <td>
                <input type="number" min="0.00" max="999999999.00" step="1" name="telefono" placeholder="Teléfono" value="{{ old('telefono', $cliente->telefono) }}">
            </td>
        </tr>
        <tr>
            <td>
                Clave de Acceso
            </td>
            <td>
                <input type="password" name="clave" placeholder="Clave de Acceso" maxlength="40" value="{{old('clave', $cliente->clave)}}">
            </td>
        </tr>
        <tr>
            <td>
                Dirección
            </td>
            <td>
                <input type="text" name="direccion" placeholder="Dirección" maxlength="100" value="{{old('direccion', $cliente->direccion)}}">
            </td>
        </tr>
        <tr>
            <td>
                Estado Civil
            </td>
            <td>
                <input type="text" name="estadoCivil" placeholder="Estado Civil" maxlength="400" value="{{old('estadoCivil', $cliente->estadoCivil)}}">
            </td>
        </tr>
        <tr>
            <td>
                Sueldo Anual
            </td>
            <td>
                <input type="number" min="0.00" max="9999999.99" step="0.01" name="sueldoAnual" placeholder="Sueldo Anual" value="{{ old('sueldoAnual' , $cliente->sueldoAnual) }}">
            </td>
        </tr>
        <br>
        <td><input type="submit" value="enviar"></td>
    </table>
</form>

@stop