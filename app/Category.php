<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Category extends Model implements TranslatableContract {
	use Translatable;

	public $translatedAttributes = [ 'name' ];

	public function projects() {
		return $this->hasMany( Project::class );
	}

	public function delete() {
		foreach ( $this->projects() as $project ) {
			$project->update( [
				'category_id' => 1
			] );
		}
		$this->deleteTranslations();

		return parent::delete(); // TODO: Change the autogenerated stub
	}
}
