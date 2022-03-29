<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Peluqueria
 * 
 * @property int $id
 * @property int $id_municipio
 * @property string $nombre
 * @property string|null $contacto
 * @property string|null $dni
 * @property string|null $n_cuenta
 * @property string $direccion
 * @property string|null $correo
 * @property string|null $telefono
 * @property string $observaciones
 * @property int $n_visitas
 * @property int|null $total_vendido
 * @property int|null $total_cobrado
 * @property Carbon|null $ultima_visita
 * @property string|null $dia_cierre
 * @property int $interesa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Municipio $municipio
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Peluqueria extends Model
{
	protected $table = 'peluquerias';

	protected $casts = [
		'id_municipio' => 'int',
		'n_visitas' => 'int',
		'total_vendido' => 'int',
		'total_cobrado' => 'int',
		'interesa' => 'int'
	];

	protected $dates = [
		'ultima_visita'
	];

	protected $fillable = [
		'id_municipio',
		'nombre',
		'contacto',
		'dni',
		'n_cuenta',
		'direccion',
		'correo',
		'telefono',
		'observaciones',
		'n_visitas',
		'total_vendido',
		'total_cobrado',
		'ultima_visita',
		'dia_cierre',
		'interesa'
	];

	public function municipio()
	{
		return $this->belongsTo(Municipio::class, 'id_municipio');
	}

	public function productos()
	{
		return $this->hasMany(Producto::class, 'id_peluqueria');
	}
}
