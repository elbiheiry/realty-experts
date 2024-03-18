<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class HomeSection extends Model implements TranslatableContract {
	use Translatable;

	public $translatedAttributes = [
		'first_section_title',
		'first_section_slogan',
		'first_section_description',
		'projects_title',
		'projects_description',
		'team_title',
		'team_description',
		'partners_title',
		'partners_description',
		'gallery_title',
		'gallery_description'
	];
	protected $fillable = [ 'image' ];
}
