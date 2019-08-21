<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewSait extends FormRequest
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
            'title' => 'required|unique:newsaits|max:255',
            'smalltext' => 'required',
            'bigtext' => 'required',
            'datepublic' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Поле "Заголовок" должен быть заполнен',
            'title.unique' => 'Поле "Заголовок" должен быть уникальное',
            'smalltext.required'  => 'Поле "Короткий текст" должен быть заполнен',
            'bigtext.required'  => ' Поле "Полны текст" должен быть заполнен',
            'datepublic.required'  => 'Поле "Дата публикации" должен быть заполнен',
        ];
    }
}
