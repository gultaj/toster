<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class QuestionRequest extends Request
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
			'title' => 'required|between:15,100',
			'body' => 'required|min:50',
			'tag_id' => 'required|array',
		];
	}

	protected function failedValidation(Validator $validator)
    {
        \Session::flash('alerts', ['danger' => 'Исправте все ошибки и попробуйте сохранить ещё раз!']);

        parent::failedValidation($validator);
    }
}
