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
	const MKV_ID = 'mkv_id';
	const MKV_NEXON_SZEMELY_ID = 'mkv_nexon_szemely_id';
	protected $table = 'v_mkv_id_nexon_szemely_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::MKV_ID => 'int',
		self::MKV_NEXON_SZEMELY_ID => 'int'
	];

	protected $fillable = [
		self::MKV_ID,
		self::MKV_NEXON_SZEMELY_ID
	];
}
