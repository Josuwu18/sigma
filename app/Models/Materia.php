<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Materia
 * 
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property int $unidades_creditos
 * @property int $id_tipo_materia
 * @property bool $estatus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property TipoMaterium $tipo_materium
 * @property Collection|Pensum[] $pensums
 * @property Collection|Prelacione[] $prelaciones
 * @property Collection|ProfesorSeccion[] $profesor_seccions
 *
 * @package App\Models
 */
class Materia extends Model
{
	protected $table = 'materias';

	protected $casts = [
		'unidades_creditos' => 'int',
		'id_tipo_materia' => 'int',
		'estatus' => 'bool'
	];

	protected $fillable = [
		'codigo',
		'nombre',
		'unidades_creditos',
		'id_tipo_materia',
		'estatus'
	];

	public function tipo_materium()
	{
		return $this->belongsTo(TipoMaterium::class, 'id_tipo_materia');
	}

	public function pensums()
	{
		return $this->hasMany(Pensum::class, 'id_materia');
	}

	public function prelaciones()
	{
		return $this->hasMany(Prelacione::class, 'id_materia_preladora');
	}

	public function profesor_seccions()
	{
		return $this->hasMany(ProfesorSeccion::class, 'id_materia');
	}
}
