<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeSectionTranslation extends Model {
	//
	protected $fillable = [
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
}
