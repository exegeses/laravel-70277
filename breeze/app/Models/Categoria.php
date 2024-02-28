<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCategoria';
    public $timestamps = false;
    protected $fillable = [ 'catNombre' ];
}
