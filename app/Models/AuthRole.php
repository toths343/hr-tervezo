<?php

namespace App\Models;

use App\Models\Base\AuthRole as BaseAuthRole;

class AuthRole extends BaseAuthRole
{
	protected $fillable = [
		'role_label',
		'role_name',
		'role_description',
		'role_creater',
		'role_modifier'
	];
}
