<?php

namespace App\Http\Requests\Admin;

use App\Partner;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class PartnerRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}

	protected function failedValidation( Validator $validator ) {
		throw new HttpResponseException( response()->json( $validator->errors()->first(), 500 ) );
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'image' => $this->routeIs( 'admin.partners' ) ? 'required|image|max:2048' : 'image|max:2048'
		];
	}

	public function messages() {
		return [
			'image.required' => $this->routeIs( 'admin.partners' ) ? 'Please choose an image' : '',
			'image.image'    => 'Please choose image not file',
			'image.max'      => 'Maximum size allowed for image is 2MB'
		];
	}

	public function store() {
		$image = new Partner();

		$image->image = image_store( $this->image, 'partners' );
		$image->save();

		image_edit( $this->image->hashName(), 'partners', 127, 97 );
	}

	public function edit( $id ) {
		$image = Partner::find( $id );

		@unlink( storage_path( 'app/partners/' . $image->image ) );
		$image->image = image_store( $this->image, 'partners' );

		$image->save();
		image_edit( $this->image->hashName(), 'partners', 127, 97 );
	}
}
