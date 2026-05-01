<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clients = [
            ['name' => 'Repsol', 'logo_path' => 'img/marcas/repsol.svg', 'display_order' => 1],
            ['name' => 'Meisa', 'logo_path' => 'img/marcas/meisa-positivo.png', 'display_order' => 2],
            ['name' => 'Elix', 'logo_path' => 'img/marcas/elix.png', 'display_order' => 3],
            ['name' => 'Dow', 'logo_path' => 'img/marcas/dow.png', 'display_order' => 4],
            ['name' => 'Nordex', 'logo_path' => 'img/marcas/Nordex-Logo.wine.png', 'display_order' => 5],
            ['name' => 'Naturgy', 'logo_path' => 'img/marcas/Naturgy.svg.png', 'display_order' => 6],
            ['name' => 'Navantia', 'logo_path' => 'img/marcas/Logo_Navantia.svg.png', 'display_order' => 7],
            ['name' => 'LyondellBasell', 'logo_path' => 'img/marcas/Logo_Lyondellbasell.svg.png', 'display_order' => 8],
            ['name' => 'Asesa', 'logo_path' => 'img/marcas/Logo_Asesa_peq_24.png', 'display_order' => 9],
            ['name' => 'Kao', 'logo_path' => 'img/marcas/Kao-corp-logo.svg.png', 'display_order' => 10],
            ['name' => 'Hercal', 'logo_path' => 'img/marcas/Hercal-Diggers-Web.png', 'display_order' => 11],
            ['name' => 'Flowserve', 'logo_path' => 'img/marcas/Flowserve.svg.png', 'display_order' => 12],
            ['name' => 'Essity', 'logo_path' => 'img/marcas/Essity_Logo_neu.svg.png', 'display_order' => 13],
            ['name' => 'Enagas', 'logo_path' => 'img/marcas/Enagas.svg.png', 'display_order' => 14],
            ['name' => 'Cepsa', 'logo_path' => 'img/marcas/Cepsa.svg.png', 'display_order' => 15],
            ['name' => 'BASF', 'logo_path' => 'img/marcas/BASF-Logo_bw.svg.png', 'display_order' => 16],
        ];

        foreach ($clients as $client) {
            Client::create($client);
        }
    }
}
