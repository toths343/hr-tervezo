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
	const JUT_UID = 'jut_uid';
	const JUT_CID = 'jut_cid';
	const JUT_TARTOZIK_FOKONYV = 'jut_tartozik_fokonyv';
	const JUT_TARTOZIK_MEGNEVEZES = 'jut_tartozik_megnevezes';
	const JUT_JUTTATAS = 'jut_juttatas';
	const JUT_KOVETEL_FOKONYV = 'jut_kovetel_fokonyv';
	const JUT_KOVETEL_MEGNEVEZES = 'jut_kovetel_megnevezes';
	const JUT_KTGTIP = 'jut_ktgtip';
	const JUT_OSZTASALAP = 'jut_osztasalap';
	const JUT_HATKEZD = 'jut_hatkezd';
	const JUT_HATVEGE = 'jut_hatvege';
	const JUT_CREATED = 'jut_created';
	const JUT_CREATER = 'jut_creater';
	const JUT_LASTUPD = 'jut_lastupd';
	const JUT_MODIFIER = 'jut_modifier';
	const JUT_DEL = 'jut_del';
	protected $table = 'juttatas';
	protected $primaryKey = 'jut_uid';
	public $timestamps = false;

	protected $casts = [
		self::JUT_UID => 'int',
		self::JUT_HATKEZD => 'datetime',
		self::JUT_HATVEGE => 'datetime',
		self::JUT_CREATED => 'datetime',
		self::JUT_LASTUPD => 'datetime',
		self::JUT_DEL => 'int'
	];
}
