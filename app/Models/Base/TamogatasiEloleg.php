<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Projekt;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TamogatasiEloleg
 * 
 * @property int $tam_uid
 * @property string $tam_sorszam
 * @property string $tam_tipus
 * @property int $tam_prj_id
 * @property float $tam_dkfbeerkezett
 * @property Carbon $tam_dkfbeerkezett_datum
 * @property float $tam_dkfelfogadott
 * @property Carbon $tam_dkfelfogadott_datum
 * @property float $tam_szallitobeerkezett
 * @property Carbon $tam_szallitobeerkezett_datum
 * @property float $tam_szallitoelszamolt
 * @property Carbon $tam_szallitoelszamolt_datum
 * @property Carbon $tam_created
 * @property string $tam_creater
 * @property Carbon $tam_lastupd
 * @property string $tam_modifier
 * @property int $tam_del
 * 
 * @property Projekt $projekt
 *
 * @package App\Models\Base
 */
class TamogatasiEloleg extends Model
{
	protected $table = 'tamogatasi_eloleg';
	protected $primaryKey = 'tam_uid';
	public $timestamps = false;

	protected $casts = [
		'tam_prj_id' => 'int',
		'tam_dkfbeerkezett' => 'float',
		'tam_dkfbeerkezett_datum' => 'datetime',
		'tam_dkfelfogadott' => 'float',
		'tam_dkfelfogadott_datum' => 'datetime',
		'tam_szallitobeerkezett' => 'float',
		'tam_szallitobeerkezett_datum' => 'datetime',
		'tam_szallitoelszamolt' => 'float',
		'tam_szallitoelszamolt_datum' => 'datetime',
		'tam_created' => 'datetime',
		'tam_lastupd' => 'datetime',
		'tam_del' => 'int'
	];

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, 'tam_prj_id', 'prj_id');
	}
}
