<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Member extends Model implements TranslatableContract {
	use Translatable;

	public $translatedAttributes = [ 'name', 'position' ];

	protected $fillable = [ 'image' ];

	public function link() {
		return $this->hasOne( MemberLink::class );
	}

	public function delete() {
		$this->deleteTranslations();
		@unlink( storage_path( 'app/members/' . $this->image ) );

		return parent::delete(); // TODO: Change the autogenerated stub
	}
}
