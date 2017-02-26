<?php

namespace App\Http\Requests\Add;

use Illuminate\Foundation\Http\FormRequest;

class ABlog extends FormRequest
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
            'title' => 'required|min:5|unique:articles',
            'keywoard' => 'max:255',
            'description'=> 'required| max:255',
            'content' => 'required',
            'header' => 'image',
        ];
    }
}
