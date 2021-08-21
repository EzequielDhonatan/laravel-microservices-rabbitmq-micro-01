<?php

namespace App\Http\Requests\Api\V1\Company;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFormRequest extends FormRequest
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

            'category_id'       => [ 'required', 'exists:categories,id' ],

            'name'              => [ 'required', "unique:companies" ],

            'phone'             => [ 'nullable', "unique:companies" ],
            'whatsapp'          => [ 'required', "unique:companies" ],
            'email'             => [ 'required', 'email', "unique:companies" ],

            'facebook'          => [ 'nullable', "unique:companies" ],
            'instagram'         => [ 'nullable', "unique:companies" ],
            'youtube'           => [ 'nullable', "unique:companies" ]

        ]; // return
    } // rules
} // StoreUpdateFormRequest
