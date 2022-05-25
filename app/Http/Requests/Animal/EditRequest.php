<?php

namespace App\Http\Requests\Animal;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'name'=> ['required', 'string', 'max:24', 'min:2'],
            'type_id'=> ['required', 'integer'],
            'breed_id'=> ['required', 'integer'],
            'diseases' => ['nullable', 'array'],
            'diseases.*' => ['integer'],
            'inoculations' => ['nullable', 'array'],
            'inoculations.*' => ['integer'],
            'description'=> ['required', 'string', 'min:24', 'max:1024'],
            'birthday_at'=> ['required', 'date'],
            'treatment_of_parasites'=> ['required', 'in:YES,NO'],
            'files' => ['array'],
            'files.*' => ['image', 'file', 'mimes:png,jpg,jpeg']
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя',
            'birthday_at' => 'День рождения'
        ];
    }
}
