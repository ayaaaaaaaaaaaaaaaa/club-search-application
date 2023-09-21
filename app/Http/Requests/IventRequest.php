<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IventRequest extends FormRequest
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
        return [
            'ivent.title' => 'required|string|max:100',
            'ivent.ivent_overview' => 'required|string|max:4000',
            'ivent.photo' => 'file|image|mimes:jpeg,jpg,png',
        ];
    }
}
