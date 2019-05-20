<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ResultFilterGetRequest
 * @package App\Http\Requests
 * @property string result_key
 * @property int region_id
 */
class ResultFilterGetRequest extends FormRequest
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
            'result_key' => 'nullable|string',
            'region_id'  => 'nullable|integer|exists:regions,id',
        ];
    }
}
