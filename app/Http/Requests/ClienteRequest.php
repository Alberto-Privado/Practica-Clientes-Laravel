<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     
     public function attributes() {
         return[
             'nombre' => 'Nombre del cliente',
             'apellidos' => 'Apellidos del cliente',
             'nacimiento' => 'Fecha de nacimiento del cliente',
             'correo' => 'Correo electonico del cliente',
             'telefono' => 'Telefono del cliente',
             'clave' => 'Clave de acceso del cliente',
             'direccion' => 'Direccion del cliente',
             'estadoCivil' => 'Estado civil del cliente',
             'sueldoAnual' => 'Sueldo anual del cliente',
             ];
     }
     
    public function authorize()
    {
        return true;
    }
    
    public function messages() {
        $required = 'El campo :attribute es obligatorio';
        $min = 'La longitud minima del campo :attribute es :min';
        $max = 'La longitud maxima del campo :attribute es :max';
        $numeric = 'El campo :attribute es numérico';
        $type = 'El valor del campo :attribute no es correcto';
        return [
            'nombre.required'               => $required,
            'nombre.max'                    => $max,
            'apellidos.required'            => $required,
            'apellidos.max'                 => $max,
            'nacimiento.required'           => $required,
            'nacimiento.type'                => $type,
            'correo.required'               => $required,
            'correo.max'                    => $max,
            'telefono.max'                  => $max,
            'clave.max'                     => $max,
            'direccion.max'                 => $max,
            'estadoCivil.max'               => $max,
            'sueldoAnual.max'               => $max,
            ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:100',
            'apellidos' => 'required|max:200',
            'nacimiento' => 'required',
            'correo' => 'required|max:400',
            'telefono' => 'required|numeric|digits:9',
            'clave' => 'max:40',
            'direccion' => 'max:100',
            'estadoCivil' => 'max:100',
            'sueldoAnual' => 'max:9',
        ];
    }
}