<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Municipio
 * 
 * @property int $id_municipio
 * @property int $id_provincia
 * @property int $cod_municipio
 * @property int $DC
 * @property string $nombre
 * @property float|null $latitud
 * @property float|null $lontigud
 * 
 * @property Collection|Peluqueria[] $peluquerias
 *
 * @package App\Models
 */
class Municipio extends Model
{
	protected $table = 'municipios';
	protected $primaryKey = 'id_municipio';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_municipio' => 'int',
		'id_provincia' => 'int',
		'cod_municipio' => 'int',
		'DC' => 'int',
		'latitud' => 'float',
		'lontigud' => 'float'
	];

	protected $fillable = [
		'id_provincia',
		'cod_municipio',
		'DC',
		'nombre',
		'latitud',
		'lontigud'
	];

	public function peluquerias()
	{
		return $this->hasMany(Peluqueria::class, 'id_municipio');
	}
}
