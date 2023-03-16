<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $request = $this;
        return [
            'name'      => ['required'],
            'email' => [
                'required',
                'email', Rule::unique('users')->where(function ($q) use ($request) {
                    return $q->where('email', $request->email)->where('active', 1);
                    }
                )],
            'password'     => ['required'],
        ];
    }

    public function message()
    {
        # code...
        return [
            'name.required' => 'Nama harap diisi',
            'email.required' => 'Email harap di isi',
            'password.required' => 'Password harap diisi',
        ];
    }
}
