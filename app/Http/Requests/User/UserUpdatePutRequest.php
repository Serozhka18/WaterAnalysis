<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UserUpdatePutRequest
 * @package App\Http\Requests\User
 * @property string name
 * @property array roles
 */
class UserUpdatePutRequest extends FormRequest
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
            'name'    => 'required|string',
            'roles'   => 'required|array',
            'roles.*' => 'required|integer',
        ];
    }
}
