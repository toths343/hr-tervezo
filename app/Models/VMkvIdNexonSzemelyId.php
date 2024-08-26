<?php

namespace App\Models;

use App\Models\Base\VMkvIdNexonSzemelyId as BaseVMkvIdNexonSzemelyId;

class VMkvIdNexonSzemelyId extends BaseVMkvIdNexonSzemelyId
{
	protected $fillable = [
		'mkv_id',
		'mkv_nexon_szemely_id'
	];
}
