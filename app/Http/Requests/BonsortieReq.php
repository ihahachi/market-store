<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BonsortieReq extends FormRequest
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
            'ref' => 'required',
            'date_' => 'required',
            'vendeur_id' => 'required'
        ];
    }
}
