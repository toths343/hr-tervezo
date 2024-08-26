<?php

namespace App\Models;

use App\Models\Base\AuthUser as BaseAuthUser;

class AuthUser extends BaseAuthUser
{
	protected $hidden = [
		'user_password'
	];

	protected $fillable = [
		'user_group_uid',
		'user_login',
		'user_password',
		'user_name',
		'user_creater',
		'user_modifier'
	];
}
