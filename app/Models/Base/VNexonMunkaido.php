<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VNexonMunkaido
 * 
 * @property int $nido_nexon_szemely_id
 * @property int $nido_jogv_id
 * @property int $nido_nisz_id
 * @property Carbon $nido_datum
 * @property float $nido_ora
 * @property string $nido_nap_tipus
 *
 * @package App\Models\Base
 */
class VNexonMunkaido extends Model
{
	protected $table = 'v_nexon_munkaido';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'nido_nexon_szemely_id' => 'int',
		'nido_jogv_id' => 'int',
		'nido_nisz_id' => 'int',
		'nido_datum' => 'datetime',
		'nido_ora' => 'float'
	];
}
