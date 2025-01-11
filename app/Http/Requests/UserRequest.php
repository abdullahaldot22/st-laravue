<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'min:2', 'max:20'],
            'email'    => ['required', 'email', 'min:2', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'phone'    => ['required', 'string', 'min:2', 'max:20', Rule::unique('users', 'phone')->ignore($this->route('user'))],
            'password' => [($this->route('user.id') ? 'nullable' : 'required'), 'string', 'min:2',]
        ];
    }
}
