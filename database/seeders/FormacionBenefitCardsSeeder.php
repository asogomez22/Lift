<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Page;
use App\Models\ContentBlock;

class FormacionBenefitCardsSeeder extends Seeder
{
    public function run()
    {
        $formacionPage = Page::where('slug', 'formacion')->first();

        if (!$formacionPage) {
            $this->command->error('Formación page not found!');
            return;
        }

        $blocks = [
            [
                'key' => 'card_1_image',
                'type' => 'image',
                'value' => 'https://lift-es.com/wp-content/uploads/2022/03/1-Copia%20de%20FORMACIÓN%203.jpg',
            ],
            [
                'key' => 'card_2_image',
                'type' => 'image',
                'value' => 'https://lift-es.com/wp-content/uploads/2022/03/20211125_104556.jpg',
            ],
            [
                'key' => 'card_3_image',
                'type' => 'image',
                'value' => 'https://lift-es.com/wp-content/uploads/2022/03/IMG_20180704_111806169-003.jpg',
            ],
            [
                'key' => 'card_4_image',
                'type' => 'image',
                'value' => 'https://lift-es.com/wp-content/uploads/2022/03/diploma-.jpg',
            ],
        ];

        foreach ($blocks as $blockData) {
            ContentBlock::updateOrCreate(
                [
                    'page_id' => $formacionPage->id,
                    'key' => $blockData['key'],
                ],
                [
                    'type' => $blockData['type'],
                    'value' => $blockData['value'],
                ]
            );
        }

        $this->command->info('Formación benefit card blocks created successfully!');
    }
}
