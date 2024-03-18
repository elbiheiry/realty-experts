<?php

namespace App\Http\Requests\Admin;

use App\Project;
use App\ProjectGallery;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectGalleryRequest extends FormRequest {
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
			'image' => $this->routeIs( 'admin.projects.images' ) ? 'required|image|max:2048' : 'image|max:2048'
		];
	}

	public function messages() {
		return [
			'image.required' => $this->routeIs( 'admin.projects.images' ) ? 'Please choose an image' : '',
			'image.image'    => 'Please choose image not file',
			'image.max'      => 'Maximum size allowed for image is 2MB'
		];
	}

	public function store( $id ) {
		$image = new ProjectGallery();

		$image->project_id = $id;
		$image->description_en = $this->description_en;
		$image->description_ar = $this->description_ar;
		$image->image = image_store( $this->image, 'projects' );
		$image->save();

		image_edit( $this->image->hashName(), 'projects', 1200, 670);
	}

	public function edit( $id ) {
		$image = ProjectGallery::find( $id );
		
		$image->description_en = $this->description_en;
		$image->description_ar = $this->description_ar;
		
		if($this->image){
		    @unlink( storage_path( 'app/projects/' . $image->image ) );
		    $image->image = image_store( $this->image, 'projects' );
		    image_edit( $this->image->hashName(), 'projects', 1200, 670);
		}

		$image->save();
	}
}
