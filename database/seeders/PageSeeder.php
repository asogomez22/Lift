<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pages = [
            ['slug' => 'home', 'name' => 'Inicio'],
            ['slug' => 'formacion', 'name' => 'Formación'],
            ['slug' => 'ingenieria', 'name' => 'Ingeniería'],
            ['slug' => 'global', 'name' => 'Ajustes Globales'],
        ];

        foreach ($pages as $pageData) {
            $page = Page::firstOrCreate(
                ['slug' => $pageData['slug']],
                ['name' => $pageData['name']]
            );

            if ($page->slug === 'formacion') {
                $formacionBlocks = [
                    // Card 1
                    ['key' => 'card_1_badge', 'value' => 'Experiencia', 'type' => 'text'],
                    ['key' => 'card_1_title', 'value' => 'Formadores', 'type' => 'text'],
                    ['key' => 'card_1_description', 'value' => 'Más de 20 años de experiencia y dominio técnico en maniobras.', 'type' => 'textarea'],
                    ['key' => 'card_1_bottom', 'value' => 'Experiencia real', 'type' => 'text'],
                    ['key' => 'card_1_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/1-Copia%20de%20FORMACIÓN%203.jpg', 'type' => 'image'],

                    // Card 2
                    ['key' => 'card_2_badge', 'value' => 'Metodología', 'type' => 'text'],
                    ['key' => 'card_2_title', 'value' => 'Cursos dinámicos', 'type' => 'text'],
                    ['key' => 'card_2_description', 'value' => 'Aprender importa más que “cubrir temario”. Participativo y efectivo.', 'type' => 'textarea'],
                    ['key' => 'card_2_bottom', 'value' => 'Alta retención', 'type' => 'text'],
                    ['key' => 'card_2_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/20211125_104556.jpg', 'type' => 'image'],

                    // Card 3
                    ['key' => 'card_3_badge', 'value' => 'Práctica', 'type' => 'text'],
                    ['key' => 'card_3_title', 'value' => 'Prácticas', 'type' => 'text'],
                    ['key' => 'card_3_description', 'value' => 'Prácticas dirigidas por técnicos especialistas en maniobras y PRL.', 'type' => 'textarea'],
                    ['key' => 'card_3_bottom', 'value' => 'En entorno real', 'type' => 'text'],
                    ['key' => 'card_3_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/IMG_20180704_111806169-003.jpg', 'type' => 'image'],

                    // Card 4
                    ['key' => 'card_4_badge', 'value' => 'Acreditación', 'type' => 'text'],
                    ['key' => 'card_4_title', 'value' => 'Título', 'type' => 'text'],
                    ['key' => 'card_4_description', 'value' => 'Obtención de título acreditativo al finalizar el curso.', 'type' => 'textarea'],
                    ['key' => 'card_4_bottom', 'value' => 'Certificación', 'type' => 'text'],
                    ['key' => 'card_4_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/diploma-.jpg', 'type' => 'image'],
                ];

                foreach ($formacionBlocks as $block) {
                    \App\Models\ContentBlock::updateOrCreate(
                        ['page_id' => $page->id, 'key' => $block['key']],
                        ['value' => $block['value'], 'type' => $block['type']]
                    );
                }
            }
        }
    }
}
