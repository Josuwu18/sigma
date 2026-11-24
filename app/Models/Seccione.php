<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Seccione
 * 
 * @property int $id
 * @property string $nombre
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Inscripcione[] $inscripciones
 * @property Collection|ProfesorSeccion[] $profesor_seccions
 *
 * @package App\Models
 */
class Seccione extends Model
{
	protected $table = 'secciones';

	protected $casts = [
		'estatus' => 'bool'
	];

	protected $fillable = [
		'nombre',
		'estatus'
	];

	public function inscripciones()
	{
		return $this->hasMany(Inscripcione::class, 'id_seccion');
	}

	public function profesor_seccions()
	{
		return $this->hasMany(ProfesorSeccion::class, 'id_seccion');
	}
}
