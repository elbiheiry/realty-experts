<?php

namespace App\Http\Requests\Admin;

use App\About;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AboutRequest extends FormRequest {
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
			'video_link'       => 'required',
			'years_of_success' => 'required',
			'image'            => $this->image ? 'image|max:2048' : '',
			'title_en'         => 'required',
			'title_ar'         => 'required',
			'subtitle_en'      => 'required',
			'subtitle_ar'      => 'required',
			'description_en'   => 'required',
			'description_ar'   => 'required',
			'tour_en'          => 'required',
			'tour_ar'          => 'required',
			'vision_en'        => 'required',
			'vision_ar'        => 'required',
			'mission_en'       => 'required',
			'mission_ar'       => 'required',
			'value_en'         => 'required',
			'value_ar'         => 'required',
			'goals_en'         => 'required',
			'goals_ar'         => 'required',
		];
	}

	public function messages() {
		return [
			'video_link.required'       => 'Please enter video link from youtube',
			'years_of_success.required' => 'Please enter your years of success',
			'image.image'               => $this->image ? 'Please choose image not a file' : '',
			'image.max'                 => $this->image ? 'Maximum size allowed for image is 2MB' : '',
			'title_en.required'         => 'Please enter the head title in english',
			'title_ar.required'         => 'Please enter the head title in arabic',
			'subtitle_en.required'      => 'Please enter the sub title in english',
			'subtitle_ar.required'      => 'Please enter the sub title in arabic',
			'description_en.required'   => 'Please enter some words about you in english',
			'description_ar.required'   => 'Please enter some words about you in arabic',
			'tour_en.required'          => 'Please enter some words about your tour in english',
			'tour_ar.required'          => 'Please enter some words about your tour in arabic',
			'vision_en.required'        => 'Please enter some words about your vision in english',
			'vision_ar.required'        => 'Please enter some words about your vision in arabic',
			'mission_en.required'       => 'Please enter some words about your mission in english',
			'mission_ar.required'       => 'Please enter some words about your mission in arabic',
			'value_en.required'         => 'Please enter some words about your value\'s in english',
			'value_ar.required'         => 'Please enter some words about your value\'s in arabic',
			'goals_en.required'         => 'Please enter some words about your goals in english',
			'goals_ar.required'         => 'Please enter some words about your goals in arabic',
		];
	}

	public function edit() {
		$about = About::first();

		$data = [
			'video_link'       => $this->video_link,
			'years_of_success' => $this->years_of_success,
			'en'               => [
				'title'       => $this->title_en,
				'subtitle'    => $this->subtitle_en,
				'description' => $this->description_en,
				'tour'        => $this->tour_en,
				'vision'      => $this->vision_en,
				'mission'     => $this->mission_en,
				'value'       => $this->value_en,
				'goals'       => $this->goals_en
			],
			'ar'               => [
				'title'       => $this->title_ar,
				'subtitle'    => $this->subtitle_ar,
				'description' => $this->description_ar,
				'tour'        => $this->tour_ar,
				'vision'      => $this->vision_ar,
				'mission'     => $this->mission_ar,
				'value'       => $this->value_ar,
				'goals'       => $this->goals_ar
			]
		];

		if ( $this->image ) {
			@unlink( storage_path( 'app/about/' . $about->image ) );

			$data['image'] = image_store( $this->image, 'about' );
			image_edit( $this->image->hashName(), 'about', 540, 380 );
		}

		$about->update( $data );
	}
}
