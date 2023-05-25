<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'username' => 'required|min:3|' . (filter_var($this->request->get('username'), FILTER_VALIDATE_EMAIL) ? 'exists:users,email' : 'exists:users,username'),
			'password' => 'required',
			'remember' => 'nullable',
		];
	}
}
