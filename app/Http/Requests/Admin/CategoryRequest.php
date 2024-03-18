<?php

namespace App\Http\Requests\Admin;

use App\Category;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CategoryRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	protected function failedValidation( Validator $validator ) {
		throw  new HttpResponseException( response()->json( $validator->errors()->first(), 500 ) );
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'name_en' => 'required',
			'name_ar' => 'required'
		];
	}

	public function messages() {
		return [
			'name_en.required' => 'Please enter category name in english',
			'name_ar.required' => 'Please enter category name in arabic'
		];
	}

	public function store() {
		$category = new Category();

		$data = [
			'en' => [
				'name' => $this->name_en
			],
			'ar' => [
				'name' => $this->name_ar
			]
		];

		$category->create( $data );
	}

	public function edit( $id ) {
		$category = Category::find( $id );

		$data = [
			'en' => [
				'name' => $this->name_en
			],
			'ar' => [
				'name' => $this->name_ar
			]
		];

		$category->update( $data );
	}
}
