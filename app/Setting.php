<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Setting extends Model implements TranslatableContract {
	use Translatable;

	public $translatedAttributes = [ 'address' ];

	protected $fillable = [ 'facebook', 'twitter', 'instagram', 'phone', 'email', 'whatsapp', 'map' ];
}
