<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\TenyBerFeloszta;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TenyBerBetolte
 * 
 * @property int $tebb_uid
 * @property int $tebb_sorszam
 * @property int $tebb_jogv_id
 * @property Carbon $tebb_von_kezd
 * @property Carbon $tebb_von_vege
 * @property Carbon $tebb_szamf_kezd
 * @property Carbon $tebb_szamf_vege
 * @property string $tebb_munkavallalo
 * @property string $tebb_tartozik_fokonyv
 * @property string $tebb_tartozik_megnevezes
 * @property string $tebb_juttatas
 * @property string $tebb_kovetel_fokonyv
 * @property string $tebb_kovetel_megnevezes
 * @property float|null $tebb_osszeg
 * @property Carbon $tebb_created
 * @property string $tebb_creater
 * @property Carbon $tebb_lastupd
 * @property string $tebb_modifier
 * @property int $tebb_del
 * 
 * @property Collection|TenyBerFeloszta[] $teny_ber_felosztas
 *
 * @package App\Models\Base
 */
class TenyBerBetolte extends Model
{
	protected $table = 'teny_ber_betoltes';
	protected $primaryKey = 'tebb_uid';
	public $timestamps = false;

	protected $casts = [
		'tebb_sorszam' => 'int',
		'tebb_jogv_id' => 'int',
		'tebb_von_kezd' => 'datetime',
		'tebb_von_vege' => 'datetime',
		'tebb_szamf_kezd' => 'datetime',
		'tebb_szamf_vege' => 'datetime',
		'tebb_osszeg' => 'float',
		'tebb_created' => 'datetime',
		'tebb_lastupd' => 'datetime',
		'tebb_del' => 'int'
	];

	public function teny_ber_felosztas()
	{
		return $this->hasMany(TenyBerFeloszta::class, 'teb_tebb_uid');
	}
}
