<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostPesanDashboardRequest extends FormRequest
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
            'name'=>'required|min:5',
            'contact' => 'required|min:12',
            'message' => 'required|min:20'
        ];
    }
}
