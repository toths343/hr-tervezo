<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VMkvIdNexonSzemelyId
 * 
 * @property int $mkv_id
 * @property int $mkv_nexon_szemely_id
 *
 * @package App\Models\Base
 */
class VMkvIdNexonSzemelyId extends Model
{
	protected $table = 'v_mkv_id_nexon_szemely_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'mkv_id' => 'int',
		'mkv_nexon_szemely_id' => 'int'
	];
}
