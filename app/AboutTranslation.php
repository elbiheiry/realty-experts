<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutTranslation extends Model {
	//
	protected $fillable = [ 'title', 'subtitle', 'description', 'tour', 'mission', 'vision', 'value', 'goals' ];
}
