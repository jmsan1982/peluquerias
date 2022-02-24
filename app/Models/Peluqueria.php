<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Peluqueria
 * 
 * @property int $id
 * @property int $id_municipio
 * @property string $nombre
 * @property string|null $contacto
 * @property string $direccion
 * @property string|null $telefono
 * @property string $observaciones
 * @property int $n_visitas
 * @property int|null $total_vendido
 * @property int|null $total_cobrado
 * 
 * @property Municipio $municipio
 *
 * @package App\Models
 */
class Peluqueria extends Model
{
	protected $table = 'peluquerias';
	public $timestamps = false;

	protected $casts = [
		'id_municipio' => 'int',
		'n_visitas' => 'int',
		'total_vendido' => 'int',
		'total_cobrado' => 'int'
	];

	protected $fillable = [
		'id_municipio',
		'nombre',
		'contacto',
		'direccion',
		'telefono',
		'observaciones',
		'n_visitas',
		'total_vendido',
		'total_cobrado'
	];

	public function municipio()
	{
		return $this->belongsTo(Municipio::class, 'id_municipio');
	}
}
