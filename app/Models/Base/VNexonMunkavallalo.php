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
	protected $table = 'v_nexon_munkavallalo';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nmkv_nexon_szemely_id' => 'int',
		'nmkv_nexon_jogv_id' => 'int',
		'nmkv_hatkezd' => 'datetime',
		'nmkv_hatvege' => 'datetime'
	];
}
