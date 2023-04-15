<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|unique:users',
            'password'=>'required|string|confirmed|min:6',
        ];
    }

    public function messages()
    {
        return [
            'email.unique:users'=>'Bu email mövcuddur',
            'password.min:6'=>'Parol minimum 6 simvol olmalıdır',
            'password.confirmed'=>'Parol ilə təkrar parol uyğun deyil',
        ];
    }
}
