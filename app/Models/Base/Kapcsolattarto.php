<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Partner;
use App\Models\ProjektPartner;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Kapcsolattarto
 * 
 * @property int $kapcs_uid
 * @property int $kapcs_id
 * @property string $kapcs_azonosito
 * @property bool $kapcs_tipus
 * @property int $kapcs_par_id
 * @property string $kapcs_nev
 * @property string|null $kapcs_email
 * @property string|null $kapcs_tel
 * @property Carbon $kapcs_hatkezd
 * @property Carbon $kapcs_hatvege
 * @property Carbon $kapcs_created
 * @property string $kapcs_creater
 * @property Carbon $kapcs_lastupd
 * @property string $kapcs_modifier
 * @property int $kapcs_del
 * 
 * @property Partner $partner
 * @property Collection|ProjektPartner[] $projekt_partners
 *
 * @package App\Models\Base
 */
class Kapcsolattarto extends Model
{
	protected $table = 'kapcsolattarto';
	protected $primaryKey = 'kapcs_uid';
	public $timestamps = false;

	protected $casts = [
		'kapcs_id' => 'int',
		'kapcs_tipus' => 'bool',
		'kapcs_par_id' => 'int',
		'kapcs_hatkezd' => 'datetime',
		'kapcs_hatvege' => 'datetime',
		'kapcs_created' => 'datetime',
		'kapcs_lastupd' => 'datetime',
		'kapcs_del' => 'int'
	];

	public function partner()
	{
		return $this->belongsTo(Partner::class, 'kapcs_par_id', 'par_id');
	}

	public function projekt_partners()
	{
		return $this->belongsToMany(ProjektPartner::class, 'projekt_partner_kapcsolattarto', 'prjpk_kapcs_id', 'prjpk_prjp_uid')
					->withPivot('prjpk_uid', 'prjpk_jelleg', 'prjpk_del');
	}
}
