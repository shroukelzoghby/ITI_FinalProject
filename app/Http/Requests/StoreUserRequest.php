<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
    * Prepare the data for validation.
    *
    * @return void
    */
    public function prepare()
    {
        if($this->password == null) {
            $this->request->remove('password');
        }

        if($this->role_id == null) {
            $this->request->remove('role_id');
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:8',
            'role_id' => 'int|exists:roles,id'
        ];
    }
}
