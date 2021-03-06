<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property int $id
 * @property int $id_firma
 * @property int $id_peluqueria
 * @property string $nombre
 * @property string|null $descripcion
 * @property float|null $precio
 * @property int|null $cantidad
 * @property int|null $descuento
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Firma $firma
 * @property Peluqueria $peluqueria
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';

	protected $casts = [
		'id_firma' => 'int',
		'id_peluqueria' => 'int',
		'precio' => 'float',
		'cantidad' => 'int',
		'descuento' => 'int'
	];

	protected $fillable = [
		'id_firma',
		'id_peluqueria',
		'nombre',
		'descripcion',
		'precio',
		'cantidad',
		'descuento'
	];

	public function firma()
	{
		return $this->belongsTo(Firma::class, 'id_firma');
	}

	public function peluqueria()
	{
		return $this->belongsTo(Peluqueria::class, 'id_peluqueria');
	}
}
