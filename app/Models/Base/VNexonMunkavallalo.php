<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VNexonMunkavallalo
 * 
 * @property string $nmkv_uid
 * @property int $nmkv_nexon_szemely_id
 * @property int $nmkv_nexon_jogv_id
 * @property string|null $nmkv_nev
 * @property Carbon $nmkv_hatkezd
 * @property Carbon $nmkv_hatvege
 *
 * @package App\Models\Base
 */
class VNexonMunkavallalo extends Model
{
	const NMKV_UID = 'nmkv_uid';
	const NMKV_NEXON_SZEMELY_ID = 'nmkv_nexon_szemely_id';
	const NMKV_NEXON_JOGV_ID = 'nmkv_nexon_jogv_id';
	const NMKV_NEV = 'nmkv_nev';
	const NMKV_HATKEZD = 'nmkv_hatkezd';
	const NMKV_HATVEGE = 'nmkv_hatvege';
	protected $table = 'v_nexon_munkavallalo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		self::NMKV_NEXON_SZEMELY_ID => 'int',
		self::NMKV_NEXON_JOGV_ID => 'int',
		self::NMKV_HATKEZD => 'datetime',
		self::NMKV_HATVEGE => 'datetime'
	];

	protected $fillable = [
		self::NMKV_UID,
		self::NMKV_NEXON_SZEMELY_ID,
		self::NMKV_NEXON_JOGV_ID,
		self::NMKV_NEV,
		self::NMKV_HATKEZD,
		self::NMKV_HATVEGE
	];
}
