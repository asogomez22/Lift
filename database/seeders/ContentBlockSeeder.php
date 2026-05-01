<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContentBlock;
use App\Models\Page;

class ContentBlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define blocks for HOME
        $home = Page::where('slug', 'home')->first();
        if ($home) {
            // Delete old blocks
            ContentBlock::where('page_id', $home->id)->delete();

            // Hero Image
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_hero_bg', 'value' => 'img/hero/grua1.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_hero_bg_2', 'value' => 'img/hero/hero2.png', 'type' => 'image']);

            // Bento Grid Images
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_bento_01', 'value' => 'img/welcome_grid/ingenieria.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_bento_02', 'value' => 'img/welcome_grid/supervision.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_bento_03', 'value' => 'img/welcome_grid/inspeccion.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_bento_04', 'value' => 'img/welcome_grid/maniobras.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_bento_05', 'value' => 'img/welcome_grid/auditorias.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'home_bento_06', 'value' => 'img/mecanico.jpg', 'type' => 'image']);
        }

        // Define blocks for FORMACION
        $formacion = Page::where('slug', 'formacion')->first();
        if ($formacion) {
            ContentBlock::where('page_id', $formacion->id)->delete();

            // Text Blocks
            ContentBlock::create(['page_id' => $formacion->id, 'key' => 'header_title_1', 'value' => 'Formaciones técnicas', 'type' => 'text']);
            ContentBlock::create(['page_id' => $formacion->id, 'key' => 'header_title_highlight', 'value' => 'en maniobras y seguridad', 'type' => 'text']);

            ContentBlock::create(['page_id' => $formacion->id, 'key' => 'header_subtitle_1', 'value' => 'Programas dinámicos y participativos para equipos de trabajo en', 'type' => 'text']);
            ContentBlock::create(['page_id' => $formacion->id, 'key' => 'header_subtitle_bold', 'value' => 'movimientos mecánicos de cargas', 'type' => 'text']);
            ContentBlock::create(['page_id' => $formacion->id, 'key' => 'header_subtitle_2', 'value' => ', con foco en ejecución segura, criterios técnicos y reducción de incidentes.', 'type' => 'text']);

            // Image Blocks
            ContentBlock::create(['page_id' => $formacion->id, 'key' => 'hero_image', 'value' => 'uploads/2022/06/20220425_134917-2.jpg', 'type' => 'image']);
        }

        // Define blocks for INGENIERIA
        $ingenieria = Page::where('slug', 'ingenieria')->first();
        if ($ingenieria) {
            ContentBlock::where('page_id', $ingenieria->id)->delete();

            // Text Blocks
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'main_heading_1', 'value' => 'Ingeniería y', 'type' => 'text']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'main_heading_highlight', 'value' => 'cálculo de maniobras', 'type' => 'text']);

            // Image Blocks
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'hero_main_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/superior-banco.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'supervision_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/imforme.jpg', 'type' => 'image']);

            // Feature Cards
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'card_1_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/06/ATLANTIC-COPPER-editada.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'card_2_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/superior-banco.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'card_3_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/sines-aurora.png', 'type' => 'image']);

            // Review & Audit Images
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'review_1_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/07/IDENTIFICACION-CADENAS.jpeg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'review_2_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/07/20200901_122229-rotated.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'review_3_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/07/muntatgeind3.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'review_4_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/07/CADENAS.jpeg', 'type' => 'image']);

            // Precision Image
            ContentBlock::create(['page_id' => $ingenieria->id, 'key' => 'precision_image', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/drone.jpg', 'type' => 'image']);
        }

        // Define blocks for GLOBAL
        $global = Page::firstOrCreate(['slug' => 'global'], ['name' => 'Global Settings']);
        ContentBlock::where('page_id', $global->id)->delete();
        ContentBlock::create(['page_id' => $global->id, 'key' => 'logo', 'value' => 'img/branding/Asset-7-1.png', 'type' => 'image']);

        // Define blocks for WELCOME (Hotspots)
        if ($home) {
            // Hotspot Images
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_1_image', 'value' => 'img/slider/SLIDER-HOME-maniobra-grua-1.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_2_image', 'value' => 'img/slider/SLIDER-HOME-estudios-maniobras-grua-3-2.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_3_image', 'value' => 'img/slider/SLIDER-HOME-formacion-2.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_4_image', 'value' => 'img/slider/SLIDER-HOME-supervision-2.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_5_image', 'value' => 'img/slider/SLIDER-HOME-camio-2.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_6_image', 'value' => 'img/slider/SLIDER-HOME-estructuras-2.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_7_image', 'value' => 'img/slider/SLIDER-HOME-REVISION-MATERIAL-IZADO.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $home->id, 'key' => 'hotspot_8_image', 'value' => 'img/slider/SLIDER-HOME-formaciones-2.png', 'type' => 'image']);
        }

        // Define blocks for PROYECTOS
        $proyectos = Page::where('slug', 'proyectos')->first();
        if ($proyectos) {
            ContentBlock::where('page_id', $proyectos->id)->delete();
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'header_title', 'value' => 'Nuestros proyectos', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'header_subtitle', 'value' => 'Casos reales en industria: ingeniería, supervisión y ejecución técnica con estándares de seguridad.', 'type' => 'text']);

            // Project 1
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p1_title', 'value' => 'BASF PDH TARRAGONA', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p1_img', 'value' => 'https://lift-es.com/wp-content/uploads/2022/08/Diapositiva3.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p1_tags', 'value' => 'Tarragona, Planta, Izaje', 'type' => 'text']);

            // Project 2
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p2_title', 'value' => 'LYONDELLBASELL TARRAGONA', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p2_img', 'value' => 'https://lift-es.com/wp-content/uploads/2022/07/13.png', 'type' => 'image']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p2_tags', 'value' => 'Tarragona, Industria, Maniobra', 'type' => 'text']);

            // Project 3
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p3_title', 'value' => 'CENTRAL TERMICA COMPOSTILLA', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p3_img', 'value' => 'https://lift-es.com/wp-content/uploads/2022/08/DETALLE-1-scaled.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p3_tags', 'value' => 'Energía, Montaje, Supervisión', 'type' => 'text']);

            // Project 4
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p4_title', 'value' => 'LYONDELL BASELL TARRAGONA', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p4_img', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/IMG-20171106-WA0002.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p4_tags', 'value' => 'Tarragona, Parada, Soportes', 'type' => 'text']);

            // Project 5
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p5_title', 'value' => 'REPSOL PETROLEO A CORUÑA', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p5_img', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/low_DSCN5553.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p5_tags', 'value' => 'A Coruña, Refinería, Carga', 'type' => 'text']);

            // Project 6
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p6_title', 'value' => 'HERCAL', 'type' => 'text']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p6_img', 'value' => 'https://lift-es.com/wp-content/uploads/2022/03/2.jpg', 'type' => 'image']);
            ContentBlock::create(['page_id' => $proyectos->id, 'key' => 'p6_tags', 'value' => 'Industria, Ejecución, Seguridad', 'type' => 'text']);
        }

        // Define blocks for DISEÑO ESTRUCTURAS
        $diseno = Page::firstOrCreate(['slug' => 'diseno-estructuras'], ['name' => 'Diseño de Estructuras']);
        ContentBlock::where('page_id', $diseno->id)->delete();

        // Hero Images
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'hero_main_image', 'value' => 'img/slider/SLIDER-HOME-estructuras-2.png', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'hero_secondary_image', 'value' => 'img/slider/SLIDER-HOME-2.jpg', 'type' => 'image']);

        // Project Images
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'project_1_image', 'value' => 'img/slider/SLIDER-HOME-estudios-maniobras-grua-3.png', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'project_2_image', 'value' => 'img/slider/SLIDER-HOME-estudios-maniobras-grua-3-2.png', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'project_3_image', 'value' => 'img/slider/SLIDER-HOME-maniobra-grua-1.png', 'type' => 'image']);

        // Gallery Images
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'gallery_1_image', 'value' => 'img/hero/grua1.jpg', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'gallery_2_image', 'value' => 'img/hero/grua2.jpg', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'gallery_3_image', 'value' => 'img/hero/hero1.jpg', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'gallery_4_image', 'value' => 'img/slider/SLIDER-HOME-supervision-2.png', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'gallery_5_image', 'value' => 'img/slider/SLIDER-HOME-formacion-2.png', 'type' => 'image']);
        ContentBlock::create(['page_id' => $diseno->id, 'key' => 'gallery_6_image', 'value' => 'img/slider/SLIDER-HOME-camio-2.png', 'type' => 'image']);
    }
}
