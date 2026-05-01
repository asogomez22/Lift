<?php

use App\Models\Page;
use Illuminate\Support\Facades\Storage;

$page = Page::where('slug', 'ingenieria')->with('contentBlocks')->first();

if (!$page) {
    echo "Page 'ingenieria' not found.\n";
    exit;
}

echo "Page: " . $page->name . "\n\n";

foreach ($page->contentBlocks as $block) {
    if ($block->type === 'image') {
        echo "Key: " . $block->key . "\n";
        echo "Value (DB): " . ($block->value ?? 'NULL') . "\n";

        if ($block->value) {
            $exists = Storage::disk('public')->exists($block->value);
            echo "File Exists in Storage (public disk): " . ($exists ? 'YES' : 'NO') . "\n";
            echo "Full Path: " . Storage::disk('public')->path($block->value) . "\n";
            echo "URL: " . Storage::disk('public')->url($block->value) . "\n";
        }
        echo "--------------------------------------------------\n";
    }
}
