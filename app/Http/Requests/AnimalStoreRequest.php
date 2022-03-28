<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnimalStoreRequest extends FormRequest
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
            'name'=> 'required',
            'type_id'=> 'required',
            'breed_id'=> 'required',
            'description'=> 'required',
            'birthday_at'=> 'required',
            'treatment_of_parasites'=> 'required'
        ];
    }
}
