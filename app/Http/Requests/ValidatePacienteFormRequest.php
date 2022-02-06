<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatePacienteFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//modificar despues con los usuarios
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombres'=>'required|max:255|string',
            'apellidos'=>'required|max:255|string',
            'dui'=>'nullable|size:10|string',
            'telefonoCasa'=>'nullable|size:9|string',
            'telefonoCelular'=>'required|size:9|string',
            'fechaDeNacimiento'=>'required|date|before:today',
            'direccion'=>'required|string',
            'referenciaPersonal'=>'nullable|max:255|string',
            'telReferenciaPersonal'=>'nullable|size:9|string',
            'ocupacion'=>'nullable|max:255|string',
            'correoElectronico'=>'nullable|max:255|email',
            'sexo_id'=>'required|integer'
        ];
    }

    public function messages()
    {
        return [
            /*'nombres.required'=>'El paciente necesita un Nombre',
            'nombres.max'=>'El nombre del paciente debe contener maximo 255 caracteres',
            'apellidos.required'=>'El paciente necesita un Apellidos',
            'apellidos.max'=>'Los apellidos del paciente debe contener maximo 255 caracteres',
            'dui.size'=>'El dui de un Paciente debe tener el siguiente formato ########-#',
            'telefonoCasa.size'=>'El telefono de casa del paciente debe tener el siguiente formato ####-####',
            'telefonoCelular.size'=>'El telefono celular del paciente debe tener el siguiente formato ####-####',
            'fechaDeNacimiento.required'=>'La fecha de nacimiento del paciente es requeridad',
            'fechaDeNacimiento.date'=>'Al ingresar la fecha de nacimiento del paciente debe respetar el formato',
            'direccion.required'=>'La direccion del paciente debe ser ingresada',
            'referenciaPersonal.max'=>'El nombre completo de la referencial personal del paciente debe tener maximo 255 caracteres',
            'telReferenciaPersonal.size'=>'El telefono de contacto de la referencia personal del paciente debe tener el siguiente formato ####-####',
            'ocupacion.max'=>'La ocupacion del Paciente no debe propasar los 255 caracteres',
            'correoElectronico.email'=>'Debe escribir un correo electronico valido',*/

        ];
    }
}
