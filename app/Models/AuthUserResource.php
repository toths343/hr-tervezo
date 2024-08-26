<?php

namespace App\Models;

use App\Models\Base\AuthUserResource as BaseAuthUserResource;

class AuthUserResource extends BaseAuthUserResource
{
	protected $fillable = [
		'aures_user_uid',
		'aures_res_id',
		'aures_res_type',
		'aures_creater',
		'aures_modifier'
	];
}
