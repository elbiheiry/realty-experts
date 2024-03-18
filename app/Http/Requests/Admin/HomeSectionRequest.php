<?php

namespace App\Http\Requests\Admin;

use App\HomeSection;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HomeSectionRequest extends FormRequest {
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
			'image'                        => $this->image ? 'image|max:2048' : '',
			'first_section_title_en'       => 'required',
			'first_section_title_ar'       => 'required',
			'first_section_slogan_en'      => 'required',
			'first_section_slogan_ar'      => 'required',
			'first_section_description_en' => 'required',
			'first_section_description_ar' => 'required',
			'projects_title_en'            => 'required',
			'projects_title_ar'            => 'required',
			'team_title_en'                => 'required',
			'team_title_ar'                => 'required',
			'partners_title_en'            => 'required',
			'partners_title_ar'            => 'required',
			'gallery_title_en'             => 'required',
			'gallery_title_ar'             => 'required'
		];
	}

	public function messages() {
		return [
			'image.image'                           => $this->image ? 'Please choose an image not file' : '',
			'image.max'                             => $this->image ? 'Maximum size allowed for image is 2MB' : '',
			'first_section_title_en.required'       => 'Please enter the first section title in english',
			'first_section_title_ar.required'       => 'Please enter the first section title in arabic',
			'first_section_slogan_en.required'      => 'Please enter the first section subtitle in english',
			'first_section_slogan_ar.required'      => 'Please enter the first section subtitle in arabic',
			'first_section_description_en.required' => 'Please enter the first section description in english',
			'first_section_description_ar.required' => 'Please enter the first section description in arabic',
			'projects_title_en.required'            => 'Please enter the projects section title in english',
			'projects_title_ar.required'            => 'Please enter the projects section title in arabic',
			'projects_description_en.required'      => 'Please enter the projects section description in english',
			'projects_description_ar.required'      => 'Please enter the projects section description in arabic',
			'team_title_en.required'                => 'Please enter the team section title in english',
			'team_title_ar.required'                => 'Please enter the team section title in arabic',
			'team_description_en.required'          => 'Please enter the team section description in english',
			'team_description_ar.required'          => 'Please enter the team section description in arabic',
			'partners_title_en.required'            => 'Please enter the partners section title in english',
			'partners_title_ar.required'            => 'Please enter the partners section title in arabic',
			'partners_description_en.required'      => 'Please enter the partners section description in english',
			'partners_description_ar.required'      => 'Please enter the partners section description in arabic',
			'gallery_title_en.required'             => 'Please enter the great moments section title in english',
			'gallery_title_ar.required'             => 'Please enter the great moments section title in arabic',
			'gallery_description_en.required'       => 'Please enter the great moments section description in english',
			'gallery_description_ar.required'       => 'Please enter the great moments section description in arabic'
		];
	}

	public function edit() {
		$section = HomeSection::first();

		$data = [
			'en' => [
				'first_section_title'       => $this->first_section_title_en,
				'first_section_slogan'      => $this->first_section_slogan_en,
				'first_section_description' => $this->first_section_description_en,
				'projects_title'            => $this->projects_title_en,
				'projects_description'      => $this->projects_description_en,
				'team_title'                => $this->team_title_en,
				'team_description'          => $this->team_description_en,
				'partners_title'            => $this->partners_title_en,
				'partners_description'      => $this->partners_description_en,
				'gallery_title'             => $this->gallery_title_en,
				'gallery_description'       => $this->gallery_description_en
			],
			'ar' => [
				'first_section_title'       => $this->first_section_title_ar,
				'first_section_slogan'      => $this->first_section_slogan_ar,
				'first_section_description' => $this->first_section_description_ar,
				'projects_title'            => $this->projects_title_ar,
				'projects_description'      => $this->projects_description_ar,
				'team_title'                => $this->team_title_ar,
				'team_description'          => $this->team_description_ar,
				'partners_title'            => $this->partners_title_ar,
				'partners_description'      => $this->partners_description_ar,
				'gallery_title'             => $this->gallery_title_ar,
				'gallery_description'       => $this->gallery_description_ar
			]
		];

		if ( $this->image ) {
			@unlink( storage_path( 'app/home/' . $section->image ) );
			$data['image'] = image_store( $this->image, 'home' );
			image_edit( $this->image->hashName(), 'home', 1920, 1100 );
		}

		$section->update( $data );
	}
}
