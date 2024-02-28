<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::insert(
            [
                [ 'catNombre'=>'Smartphone' ],
                [ 'catNombre'=>'Cámaras mirroless' ],
                [ 'catNombre'=>'Lentes' ],
                [ 'catNombre'=>'Parlantes bluetooth' ],
                [ 'catNombre'=>'Smart TV' ],
                [ 'catNombre'=>'Consolas' ],
                [ 'catNombre'=>'Tablets' ]
            ]
        );
    }
}
