<?php

namespace App\Http\Requests\Admin;

use App\Member;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class MemberRequest extends FormRequest {
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
			'image'          => $this->routeIs( 'admin.members' ) ? 'required|image|max:2048' : 'image|max:2048',
			'name_en'        => 'required',
			'name_ar'        => 'required',
			'position_en'    => 'required',
			'position_ar'    => 'required'
		];
	}

	public function messages() {
		return [
			'image.required'          => $this->routeIs( 'admin.members' ) ? 'Please upload member image' : '',
			'image.image'             => 'Please choose an image not file',
			'image.max'               => 'Maximum size allowed for image is 2 MB',
			'name_en.required'        => 'Please enter member name in english',
			'name_ar.required'        => 'Please enter member name in arabic',
			'position_en.required'    => 'Please enter member position in english',
			'position_ar.required'    => 'Please enter member position in arabic'
		];
	}

	public function store() {
		$member = new Member();

		$data = [
			'en'    => [
				'name'        => $this->name_en,
				'position'    => $this->position_en
			],
			'ar'    => [
				'name'        => $this->name_ar,
				'position'    => $this->position_ar
			],
			'image' => image_store( $this->image, 'members' )
		];

		$member->create( $data );

		image_edit( $this->image->hashName(), 'members', 200, 200 );
	}

	public function edit( $id ) {
		$member = Member::find( $id );

		$data = [
			'en' => [
				'name'        => $this->name_en,
				'position'    => $this->position_en
			],
			'ar' => [
				'name'        => $this->name_ar,
				'position'    => $this->position_ar
			]
		];

		if ( $this->image ) {
			@unlink( storage_path( 'app/members/' . $member->image ) );
			$data['image'] = image_store( $this->image, 'members' );
			image_edit( $this->image->hashName(), 'members', 200, 200 );
		}

		$member->update( $data );
	}
}
