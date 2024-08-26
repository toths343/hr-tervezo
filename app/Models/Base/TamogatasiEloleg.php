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
	const TAM_UID = 'tam_uid';
	const TAM_SORSZAM = 'tam_sorszam';
	const TAM_TIPUS = 'tam_tipus';
	const TAM_PRJ_ID = 'tam_prj_id';
	const TAM_DKFBEERKEZETT = 'tam_dkfbeerkezett';
	const TAM_DKFBEERKEZETT_DATUM = 'tam_dkfbeerkezett_datum';
	const TAM_DKFELFOGADOTT = 'tam_dkfelfogadott';
	const TAM_DKFELFOGADOTT_DATUM = 'tam_dkfelfogadott_datum';
	const TAM_SZALLITOBEERKEZETT = 'tam_szallitobeerkezett';
	const TAM_SZALLITOBEERKEZETT_DATUM = 'tam_szallitobeerkezett_datum';
	const TAM_SZALLITOELSZAMOLT = 'tam_szallitoelszamolt';
	const TAM_SZALLITOELSZAMOLT_DATUM = 'tam_szallitoelszamolt_datum';
	const TAM_CREATED = 'tam_created';
	const TAM_CREATER = 'tam_creater';
	const TAM_LASTUPD = 'tam_lastupd';
	const TAM_MODIFIER = 'tam_modifier';
	const TAM_DEL = 'tam_del';
	protected $table = 'tamogatasi_eloleg';
	protected $primaryKey = 'tam_uid';
	public $timestamps = false;

	protected $casts = [
		self::TAM_UID => 'int',
		self::TAM_PRJ_ID => 'int',
		self::TAM_DKFBEERKEZETT => 'float',
		self::TAM_DKFBEERKEZETT_DATUM => 'datetime',
		self::TAM_DKFELFOGADOTT => 'float',
		self::TAM_DKFELFOGADOTT_DATUM => 'datetime',
		self::TAM_SZALLITOBEERKEZETT => 'float',
		self::TAM_SZALLITOBEERKEZETT_DATUM => 'datetime',
		self::TAM_SZALLITOELSZAMOLT => 'float',
		self::TAM_SZALLITOELSZAMOLT_DATUM => 'datetime',
		self::TAM_CREATED => 'datetime',
		self::TAM_LASTUPD => 'datetime',
		self::TAM_DEL => 'int'
	];

	public function projekt()
	{
		return $this->belongsTo(Projekt::class, \App\Models\TamogatasiEloleg::TAM_PRJ_ID, Projekt::PRJ_ID);
	}
}
