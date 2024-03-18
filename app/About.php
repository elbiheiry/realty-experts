<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class About extends Model implements TranslatableContract {
	use Translatable;

	public $translatedAttributes = [
		'title',
		'subtitle',
		'description',
		'tour',
		'mission',
		'vision',
		'value',
		'goals'
	];
	protected $fillable = [ 'video_link', 'years_of_success', 'image' ];
}
