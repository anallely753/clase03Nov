<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class CreateProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = [
            [
                'nombre'=>'Crema de nuez',
                'foto'=>'avellanta-195.jpg',
                'categoria'=>'195g',
                'precio'=>'85',
                'stock'=>'20'
            ],
            [
                'nombre'=>'Crema de avellana',
                'foto'=>'avellanta-195.jpg',
                'categoria'=>'195g',
                'precio'=>'85',
                'stock'=>'20'
            ],
            [
                'nombre'=>'Crema de cacahuate',
                'foto'=>'avellanta-195.jpg',
                'categoria'=>'195g',
                'precio'=>'85',
                'stock'=>'20'
            ],
            [
                'nombre'=>'Crema de nuez',
                'foto'=>'avellanta-195.jpg',
                'categoria'=>'300g',
                'precio'=>'85',
                'stock'=>'20'
            ],
        ];

        Producto::insert($productos);
    }
}
