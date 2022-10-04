<?php

namespace App\Http\Requests\City;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'search-query' => 'required|min:1|max:255',
        ];
    }

    public function messages()
    {
        return [
            'search-query.required' => 'Необходимо заполнить поисковой запрос',
            'search-query.min' => 'Длина поискового запроса должна быть не менее :min символов',
            'search-query.max' => 'Длина поискового запроса должна быть не более :max символов',
        ];
    }
}
