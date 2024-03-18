<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectTranslation extends Model {
	//
	protected $fillable = [ 'name', 'subtitle', 'description', 'developer_company','indirect_sales', 'payment_methods' ];
}
