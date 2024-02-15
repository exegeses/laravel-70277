<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProducto';
    public $timestamps = false;

    /**
     * Chequear si hay productos relacionados a una marca
     */
    static function checkProductoPorMarca( string $idMarca ) : int
    {
        //$chech = Producto::where('idMarca', $idMarca)->first();
        //$chech = Producto::firstWhere('idMarca', $idMarca);
        $check = Producto::where('idMarca', $idMarca)->count();
        return $check;
    }

    /*### métodos de relaci´´on  ###*/
    public function getMarca() : BelongsTo
    {
        return $this->belongsTo(
                   Marca::class,
                'idMarca',
                'idMarca'
        );
    }

    public function getCategoria() : BelongsTo
    {
        return $this->belongsTo(
                    Categoria::class,
                    'idCategoria',
                    'idCategoria'
        );
    }


}
