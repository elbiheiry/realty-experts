<?php

namespace App\Http\Requests\Admin;

use App\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest {
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
			'facebook'   => 'required',
			'twitter'    => 'required',
			'instagram'  => 'required',
			'phone'      => 'required',
			'email'      => 'required',
			'whatsapp'   => 'required',
			'map'        => 'required',
			'address_en' => 'required',
			'address_ar' => 'required',
		];
	}

	public function messages() {
		return [
			'facebook.required'   => 'Please enter your facebook page link',
			'twitter.required'    => 'Please enter your twitter account link',
			'instagram.required'  => 'Please enter your instagram account link',
			'phone.required'      => 'Please enter your linkedin account link',
			'email.required'      => 'Please enter your email address',
			'whatsapp.required'   => 'Please enter your whatsapp number',
			'map.required'        => 'Please enter your location on the map',
			'address_en.required' => 'Please enter your address in english',
			'address_ar.required' => 'Please enter your address in arabic',
		];
	}

	public function edit() {
		$setting = Setting::first();

		$data = [
			'en'        => [
				'address' => $this->address_en
			],
			'ar'        => [
				'address' => $this->address_ar
			],
			'facebook'  => $this->facebook,
			'twitter'   => $this->twitter,
			'instagram' => $this->instagram,
			'phone'     => $this->phone,
			'email'     => $this->email,
			'whatsapp'  => $this->whatsapp,
			'map'       => $this->map
		];

		$setting->update( $data );
	}
}
