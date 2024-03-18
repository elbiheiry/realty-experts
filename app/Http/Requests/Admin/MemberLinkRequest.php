<?php

namespace App\Http\Requests\Admin;

use App\MemberLink;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MemberLinkRequest extends FormRequest {
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
			'linkedin' => 'required'
		];
	}

	public function messages() {
		return [
			'linkedin.required' => 'Please enter linkedin link'
		];
	}

	public function store( $id ) {

		$link = MemberLink::where( 'member_id', $id )->first();
		if ( $link ) {
			$link->update( [
				'linkedin'  => $this->linkedin,
				'facebook'  => $this->facebook,
				'twitter'   => $this->twitter,
				'instagram' => $this->instagram
			] );
		} else {
			$link = new MemberLink();

			$link->create( [
				'linkedin'  => $this->linkedin,
				'facebook'  => $this->facebook,
				'twitter'   => $this->twitter,
				'instagram' => $this->instagram,
				'member_id' => $id
			] );
		}
	}
}
