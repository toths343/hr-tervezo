<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SysLog
 *
 * @property int $log_id
 * @property string $log_sql_user
 * @property string|null $log_user
 * @property string $log_type
 * @property string $log_table
 * @property int $log_table_rec_uid
 * @property string $log_data
 * @property Carbon $log_timestamp
 *
 * @package App\Models
 */
class SysLog extends Model
{
	const LOG_ID = 'log_id';
	const LOG_SQL_USER = 'log_sql_user';
	const LOG_USER = 'log_user';
	const LOG_TYPE = 'log_type';
	const LOG_TABLE = 'log_table';
	const LOG_TABLE_REC_UID = 'log_table_rec_uid';
	const LOG_DATA = 'log_data';
	const LOG_TIMESTAMP = 'log_timestamp';
	protected $table = 'sys_log';
	protected $primaryKey = 'log_id';
	public $timestamps = false;

	protected $casts = [
		self::LOG_ID => 'int',
		self::LOG_TABLE_REC_UID => 'int',
		self::LOG_TIMESTAMP => 'datetime'
	];

	protected $fillable = [
		self::LOG_SQL_USER,
		self::LOG_USER,
		self::LOG_TYPE,
		self::LOG_TABLE,
		self::LOG_TABLE_REC_UID,
		self::LOG_DATA,
		self::LOG_TIMESTAMP
	];
}
