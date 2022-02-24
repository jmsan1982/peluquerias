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
 * @property int $id_tipo_producto
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property int $precio
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property TipoProducto $tipo_producto
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';

	protected $casts = [
		'id_tipo_producto' => 'int',
		'precio' => 'int'
	];

	protected $fillable = [
		'id_tipo_producto',
		'nombre',
		'descripcion',
		'precio'
	];

	public function tipo_producto()
	{
		return $this->belongsTo(TipoProducto::class, 'id_tipo_producto');
	}
}
