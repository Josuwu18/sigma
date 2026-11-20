<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccion
 * 
 * @property int $id
 * @property string $nombre
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Seccion extends Model
{
	protected $table = 'seccions';

	protected $casts = [
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'estatus'
	];
}
