<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Document;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'title' => 'Maniobras de Movimientos Mecánicos',
                'description' => 'Formación técnica',
                'file_path' => 'https://lift-es.com/wp-content/uploads/2022/03/FICHA-FORMACION-EN-MANIOBRAS-DE-MOVIMIENTOS-MECANICOS-DE-CARGAS.pdf',
                'section' => 'formacion',
                'is_visible' => true,
            ],
            [
                'title' => 'Supervisor de Parques Eólicos',
                'description' => 'Supervisión operativa',
                'file_path' => 'https://lift-es.com/wp-content/uploads/2022/03/FICHA-FORMACIO%CC%81N-PARA-PARQUES-EO%CC%81LICOS-EN-MANIOBRAS-DE-MOVIMIENTOS-MECA%CC%81NICOS-DE-CARGAS.pdf',
                'section' => 'formacion',
                'is_visible' => true,
            ],
            [
                'title' => 'Jefe de Maniobras',
                'description' => 'Dirección de maniobra',
                'file_path' => 'https://lift-es.com/wp-content/uploads/2022/03/FICHA-FORMACIO%CC%81N-JEFE-DE-MANIOBRAS.pdf',
                'section' => 'formacion',
                'is_visible' => true,
            ],
            [
                'title' => 'Señalista Eslingador',
                'description' => 'Señales y eslingado',
                'file_path' => 'https://lift-es.com/wp-content/uploads/2022/03/FICHA-FORMACIO%CC%81N-SEN%CC%83ALISTA-ESLINGADOR.pdf',
                'section' => 'formacion',
                'is_visible' => true,
            ],
            [
                'title' => 'Operador Grúa Articulada',
                'description' => 'Operación segura',
                'file_path' => 'https://lift-es.com/wp-content/uploads/2022/03/FICHA-FORMACIO%CC%81N-OPERADOR-DE-GRU%CC%81A-ARTICULADA-SOBRE-CAMIO%CC%81N.pdf',
                'section' => 'formacion',
                'is_visible' => true,
            ],
        ];

        foreach ($documents as $doc) {
            Document::updateOrCreate(
                ['title' => $doc['title']],
                $doc
            );
        }
    }
}
