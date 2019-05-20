<?php

namespace App\Http\Requests\Result;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ResultSavePostRequest
 * @package App\Http\Requests\Result
 * @property int region_id
 * @property string result
 */
class ResultSavePostRequest extends FormRequest
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
            'region_id' => 'required|integer|exists:regions,id',
            'result'    => 'required|string',
        ];
    }
}
