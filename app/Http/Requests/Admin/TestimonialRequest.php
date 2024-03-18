<?php

namespace App\Http\Requests\Admin;

use App\Testimonial;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class TestimonialRequest extends FormRequest {
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
			'image'          => $this->routeIs( 'admin.testimonials' ) ? 'required|image|max:2024' : 'image|max:2024',
			'name_en'        => 'required',
			'name_ar'        => 'required',
			'position_en'    => 'required',
			'position_ar'    => 'required',
			'description_en' => 'required',
			'description_ar' => 'required',
		];
	}

	public function messages() {
		return [
			'image.required'          => $this->routeIs( 'admin.testimonials' ) ? 'Please choose an image' : '',
			'image.image'             => 'Please choose image not file',
			'image.max'               => 'Maximum size allowed for image is 2MB',
			'name_en.required'        => 'Please enter the name in english',
			'name_ar.required'        => 'Please enter the name in arabic',
			'position_en.required'    => 'Please enter the position in english',
			'position_ar.required'    => 'Please enter the position in arabic',
			'description_en.required' => 'Please enter the description in english',
			'description_ar.required' => 'Please enter the description in arabic'
		];
	}

	public function store() {
		$testimonial = new Testimonial();

		$data = [
			'en'    => [
				'name'        => $this->name_en,
				'position'    => $this->position_en,
				'description' => $this->description_en
			],
			'ar'    => [
				'name'        => $this->name_ar,
				'position'    => $this->position_ar,
				'description' => $this->description_ar
			],
			'image' => image_store( $this->image, 'testimonials' )
		];

		$testimonial->create( $data );

		image_edit( $this->image->hashName(), 'testimonials', 80, 80 );
	}

	public function edit( $id ) {
		$testimonial = Testimonial::find( $id );

		$data = [
			'en' => [
				'name'        => $this->name_en,
				'position'    => $this->position_en,
				'description' => $this->description_en
			],
			'ar' => [
				'name'        => $this->name_ar,
				'position'    => $this->position_ar,
				'description' => $this->description_ar
			],

		];

		if ( $this->image ) {
			@unlink( storage_path( 'app/testimonials/' . $testimonial->image ) );
			$data['image'] = image_store( $this->image, 'testimonials' );
			image_edit( $this->image->hashName(), 'testimonials', 80, 80 );
		}

		$testimonial->update( $data );
	}
}
