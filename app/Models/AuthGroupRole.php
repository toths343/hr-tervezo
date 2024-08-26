<?php

namespace App\Models;

use App\Models\Base\AuthGroupRole as BaseAuthGroupRole;

class AuthGroupRole extends BaseAuthGroupRole
{
	protected $fillable = [
		'grole_group_uid',
		'grole_role_uid',
		'grole_creater',
		'grole_modifier'
	];
}
