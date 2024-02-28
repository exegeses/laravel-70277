<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $primaryKey = 'idProducto';
    public $timestamps = false;
    protected $fillable = [
                            'prdNombre',
                            'prdPrecio',
                            'idMarca',
                            'idCategoria',
                            'prdDescripcion',
                            'prdImagen'
                        ];
    public function getMarca()
    {
        return $this->belongsTo(
            Marca::class,
            'idMarca',
            'idMarca'
        );
    }
    public function getCate()
    {
        return $this->belongsTo(
            Categoria::class,
            'idCategoria',
            'idCategoria'
        );
    }
}
