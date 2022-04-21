<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => ['required', 'string', 'min:2', 'max:255', 'alpha'],
            'surname' => ['required', 'string', 'min:2', 'max:255', 'alpha'],
            'description' => ['nullable', 'string', 'min:24', 'max:1024'],
            'phone' => ['required', 'string', 'min:4', 'max:13', Rule::unique('profiles')->ignore($this->profile)],
            'address' => ['required', 'string', 'min:5', 'max:255'],
            'birthday_at' => ['required', 'date'],
            'avatar' => ['image', 'file', 'mimes:png,jpg,jpeg']
        ];
    }
}
