<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MemberLink extends Model {
	//
	protected $fillable = [ 'facebook', 'twitter', 'instagram', 'linkedin','member_id' ];
}
