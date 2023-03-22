<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HorarioFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'area'=>'required',
            'turno'=>'required',
            'personal'=>'required',
            'inicio'=>'required|date',
            'fin'=>'required|date|after:inicio',
            'dias'=>'required|array|min:1'
        ];
    }
}
