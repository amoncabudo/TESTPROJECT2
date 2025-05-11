<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;

class Categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::insert([ 
            'nom' => 'Vehicles'
        ]);
        Categoria::insert([ 
            'nom' => 'Immobiliaria'
        ]);
        Categoria::insert([ 
            'nom' => 'Feina'
        ]);
        Categoria::insert([ 
            'nom' => 'Tecnologia'
        ]);
        Categoria::insert([ 
            'nom' => 'Moda i complements'
        ]);
        Categoria::insert([ 
            'nom' => 'Llar i jardi'
        ]);
        Categoria::insert([ 
            'nom' => 'Esports i oci'
        ]);
        Categoria::insert([ 
            'nom' => 'Mascotes'
        ]);
        Categoria::insert([ 
            'nom' => 'Serveis'
        ]);
        Categoria::insert([ 
            'nom' => 'Altres'
        ]);
    }
}
