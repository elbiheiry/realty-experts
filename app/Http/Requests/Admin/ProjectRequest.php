<?php

namespace App\Http\Requests\Admin;

use App\Project;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProjectRequest extends FormRequest {
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
			'category_id'        => 'not_in:0',
			'region_id'          => 'not_in:0',
			'min_price'          => $this->max_price ? 'required' : '',
			'min_space'          => $this->max_space ? 'required' : '',
			'max_price'          => $this->min_price ? 'required' : '',
			'max_space'          => $this->min_space ? 'required' : '',
			'image'              => $this->routeIs( 'admin.projects' ) ? 'required|image|max:2024' : 'image|max:2024',
			'brochure'           => $this->brochure ? 'mimes:pdf' : '',
			'name_en'            => 'required',
			'name_ar'            => 'required'
		];
	}

	public function messages() {
		return [
			'category_id.not_in'          => 'Please choose project category',
			'region_id.not_in'            => 'Please choose project region',
			'min_price.required'          => $this->max_price ? 'Please enter the minimum price for this project' : '',
			'min_space.required'          => $this->max_space ? 'Please enter the minimum space for this project' : '',
			'max_price.required'          => $this->min_price ? 'Please enter the maximum price for this project' : '',
			'max_space.required'          => $this->min_space ? 'Please enter the maximum space for this project' : '',
			'image.required'              => $this->routeIs( 'admin.projects' ) ? 'Please choose project main image' : '',
			'image.image'                 => 'Please choose an image not file',
			'image.max'                   => 'Maximum size allowed for image is 2 MB',
			'brochure.mimes'              => $this->brochure ? 'Allowed extensions for brochure is only .pdf' : '',
			'name_en.required'            => 'Please enter project name in english',
			'name_ar.required'            => 'Please enter project name in arabic',
		];
	}

	public function store() {
		$project = new Project();

		$data = [
			'en'          => [
				'name'            => $this->name_en,
				'subtitle'        => $this->subtitle_en,
				'description'     => $this->description_en,
				'indirect_sales'  => $this->indirect_sales_en,
				'payment_methods' => $this->payment_methods_en,
				'developer_company' => $this->developer_company_en,
			],
			'ar'          => [
				'name'            => $this->name_ar,
				'subtitle'        => $this->subtitle_ar,
				'description'     => $this->description_ar,
				'indirect_sales'  => $this->indirect_sales_ar,
				'payment_methods' => $this->payment_methods_ar,
				'developer_company' => $this->developer_company_ar
			],
			'min_price'   => $this->min_price,
			'max_price'   => $this->max_price,
			'min_space'   => $this->min_space,
			'max_space'   => $this->max_space,
			'map'         => $this->map,
			'category_id' => $this->category_id,
			'region_id'   => $this->region_id,
			'video_link'  => $this->video_link,
			'image'       => image_store( $this->image, 'projects' )
		];
		
		if($this->brochure){
		    $data['brochure'] = image_store( $this->brochure, 'projects' );
		}

		$project->create( $data );

		image_edit( $this->image->hashName(), 'projects', 782, 635 );
	}

	public function edit( $id ) {
		$project = Project::find( $id );

		$data = [
			'en'          => [
				'name'            => $this->name_en,
				'subtitle'        => $this->subtitle_en,
				'description'     => $this->description_en,
				'indirect_sales'  => $this->indirect_sales_en,
				'payment_methods' => $this->payment_methods_en,
				'developer_company' => $this->developer_company_en
			],
			'ar'          => [
				'name'            => $this->name_ar,
				'subtitle'        => $this->subtitle_ar,
				'description'     => $this->description_ar,
				'indirect_sales'  => $this->indirect_sales_ar,
				'payment_methods' => $this->payment_methods_ar,
				'developer_company' => $this->developer_company_ar
			],
			'min_price'   => $this->min_price,
			'max_price'   => $this->max_price,
			'min_space'   => $this->min_space,
			'max_space'   => $this->max_space,
			'map'         => $this->map,
			'category_id' => $this->category_id,
			'region_id'   => $this->region_id,
			'video_link'  => $this->video_link
		];

		if ( $this->image ) {
			@unlink( storage_path( 'app/projects/' . $project->image ) );
			$data['image'] = image_store( $this->image, 'projects' );
			image_edit( $this->image->hashName(), 'projects', 782, 635 );
		}

		if ( $this->brochure ) {
			@unlink( storage_path( 'app/projects/' . $project->brochure ) );
			$data['brochure'] = image_store( $this->brochure, 'projects' );
		}

		$project->update( $data );

	}
}
