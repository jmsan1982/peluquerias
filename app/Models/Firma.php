<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Firma
 * 
 * @property int $id
 * @property string|null $nombre
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * 
 * @property Collection|Producto[] $productos
 *
 * @package App\Models
 */
class Firma extends Model
{
	protected $table = 'firmas';

	protected $fillable = [
		'nombre'
	];

	public function productos()
	{
		return $this->hasMany(Producto::class, 'id_firma');
	}
}
