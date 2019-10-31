@extends('base')

@section('contenido')

<!-- Aqui va el listado -->
@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ url('cliente') }}" method="post">
    @csrf
    <table class="table table-striped table-hover">
        <tr>
            <td>
                Nombre
            </td>
            <td>
                <input type="text" name="nombre" placeholder="Nombre" maxlength="100" required value="{{ old('nombre') }}">
            </td>
        </tr>
        <tr>
            <td>
                Apellidos
            </td>
            <td>
                <input type="text" name="apellidos" placeholder="Apellidos" maxlength="200" required value="{{ old('apellidos') }}">
            </td>
        </tr>
        <tr>
            <td>
                Fecha Nacimiento
            </td>
            <td>
                <input type="date" name="nacimiento" placeholder="Fecha de Nacimiento" value="1990-01-01" required value="{{ old('nacimiento') }}">
            </td>
        </tr>
        <tr>
            <td>
                Correo Electronico
            </td>
            <td>
                <input type="email" name="correo" placeholder="Correo Electrónico" maxlength="400" required value="{{old('correo')}}">
            </td>
        </tr>
        <tr>
            <td>
                Telefono
            </td>
            <td>
                <input type="number" min="0.00" max="999999999.00" step="1" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}">
            </td>
        </tr>
        <tr>
            <td>
                Clave de Acceso
            </td>
            <td>
                <input type="password" name="clave" placeholder="Clave de Acceso" maxlength="40" value="{{old('clave')}}">
            </td>
        </tr>
        <tr>
            <td>
                Dirección
            </td>
            <td>
                <input type="text" name="direccion" placeholder="Dirección" maxlength="100" value="{{old('direccion')}}">
            </td>
        </tr>
        <tr>
            <td>
                Estado Civil
            </td>
            <td>
                <input type="text" name="estadoCivil" placeholder="Estado Civil" maxlength="400" value="{{old('estadoCivil')}}">
            </td>
        </tr>
        <tr>
            <td>
                Sueldo Anual
            </td>
            <td>
                <input type="number" min="0.00" max="9999999.99" step="0.01" name="sueldoAnual" placeholder="Sueldo Anual" value="{{ old('sueldoAnual') }}">
            </td>
        </tr>
        <br>
        <td><input type="submit" value="enviar"></td>
    </table>
</form>

@stop