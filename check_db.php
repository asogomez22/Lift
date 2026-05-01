<?php

use App\Models\Page;
use Illuminate\Support\Facades\Storage;

$page = Page::where('slug', 'ingenieria')->with('contentBlocks')->first();

if (!$page) {
    echo "Page 'ingenieria' not found.\n";
    exit;
}

foreach ($page->contentBlocks as $block) {
    if ($block->type === 'image') {
        echo "Key: " . $block->key . " | Value: " . ($block->value ?? 'NULL') . "\n";
    }
}
