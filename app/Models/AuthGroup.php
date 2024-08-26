<?php

namespace App\Models;

use App\Models\Base\AuthGroup as BaseAuthGroup;

class AuthGroup extends BaseAuthGroup
{
	protected $fillable = [
		'group_name',
		'group_type',
		'group_creater',
		'group_modifier'
	];
}
