<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TenyBerBetolte;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TenyBerFeloszta
 * 
 * @property int $teb_uid
 * @property int $teb_tebb_uid
 * @property int $teb_jogv_id
 * @property int|null $teb_jut_uid
 * @property int $teb_szamf_ev
 * @property int $teb_szamf_honap
 * @property Carbon $teb_von_kezd
 * @property Carbon $teb_von_vege
 * @property int $teb_m_napok
 * @property int $teb_n_napok
 * @property float $teb_m_ora
 * @property float $teb_osszeg
 * @property int $teb_nido_hiany
 * @property Carbon $teb_created
 * @property string $teb_creater
 * @property Carbon $teb_lastupd
 * @property string $teb_modifier
 * @property int $teb_del
 * 
 * @property TenyBerBetolte $teny_ber_betolte
 *
 * @package App\Models\Base
 */
class TenyBerFeloszta extends Model
{
	protected $table = 'teny_ber_felosztas';
	protected $primaryKey = 'teb_uid';
	public $timestamps = false;

	protected $casts = [
		'teb_tebb_uid' => 'int',
		'teb_jogv_id' => 'int',
		'teb_jut_uid' => 'int',
		'teb_szamf_ev' => 'int',
		'teb_szamf_honap' => 'int',
		'teb_von_kezd' => 'datetime',
		'teb_von_vege' => 'datetime',
		'teb_m_napok' => 'int',
		'teb_n_napok' => 'int',
		'teb_m_ora' => 'float',
		'teb_osszeg' => 'float',
		'teb_nido_hiany' => 'int',
		'teb_created' => 'datetime',
		'teb_lastupd' => 'datetime',
		'teb_del' => 'int'
	];

	public function teny_ber_betolte()
	{
		return $this->belongsTo(TenyBerBetolte::class, 'teb_tebb_uid');
	}
}
