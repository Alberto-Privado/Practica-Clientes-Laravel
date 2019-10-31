@extends('base')

@section('contenido')

<!-- Aqui va el listado -->

<form action="{{ url('cliente') }}" method="post">
    @csrf
    <table class="table table-striped table-hover">
        <tr>
            <td>
                Nombre
            </td>
            <td>
                {{ $cliente->nombre }}
            </td>
        </tr>
        <tr>
            <td>
                Apellidos
            </td>
            <td>
                {{ $cliente->apellidos }}
            </td>
        </tr>
        <tr>
            <td>
                Fecha de Nacimiento
            </td>
            <td>
                {{ $cliente->nacimiento }}
            </td>
        </tr>
        <tr>
            <td>
                Correo Electronico
            </td>
            <td>
                {{ $cliente->correo }}
            </td>
        </tr>
        <tr>
            <td>
                Telefono
            </td>
            <td>
                {{ $cliente->telefono }}
            </td>
        </tr>
        <tr>
            <td>
                Direccion
            </td>
            <td>
                {{ $cliente->direccion }}
            </td>
        </tr>
        <tr>
            <td>
                Estado Civil
            </td>
            <td>
                {{ $cliente->estadoCivil }}
            </td>
        </tr>
        <tr>
            <td>
                Sueldo Anual
            </td>
            <td>
                {{ $cliente->sueldoAnual }}
            </td>
        </tr>
        <tr>
            <td>
                IP
            </td>
            <td>
                {{ $cliente->ip }}
            </td>
        </tr>
    </table>
</form>

@stop