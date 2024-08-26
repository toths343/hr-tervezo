<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Juttata
 * 
 * @property int $jut_uid
 * @property string $jut_cid
 * @property string $jut_tartozik_fokonyv
 * @property string $jut_tartozik_megnevezes
 * @property string $jut_juttatas
 * @property string $jut_kovetel_fokonyv
 * @property string $jut_kovetel_megnevezes
 * @property string $jut_ktgtip
 * @property string $jut_osztasalap
 * @property Carbon $jut_hatkezd
 * @property Carbon $jut_hatvege
 * @property Carbon $jut_created
 * @property string $jut_creater
 * @property Carbon $jut_lastupd
 * @property string $jut_modifier
 * @property int $jut_del
 *
 * @package App\Models\Base
 */
class Juttata extends Model
{
	protected $table = 'juttatas';
	protected $primaryKey = 'jut_uid';
	public $timestamps = false;

	protected $casts = [
		'jut_hatkezd' => 'datetime',
		'jut_hatvege' => 'datetime',
		'jut_created' => 'datetime',
		'jut_lastupd' => 'datetime',
		'jut_del' => 'int'
	];
}
