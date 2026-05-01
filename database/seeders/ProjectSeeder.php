<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'BASF PDH TARRAGONA',
            'description' => 'Proyecto integral de ingeniería y supervisión para instalación industrial en planta química',
            'image_path' => 'https://lift-es.com/wp-content/uploads/2022/08/Diapositiva3.jpg',
            'tags' => 'Tarragona, Planta, Izaje',
            'display_order' => 1,
        ]);
    }
}
