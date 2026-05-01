<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

class Page extends Model
{
    protected $fillable = ['slug', 'name'];

    public function contentBlocks()
    {
        return $this->hasMany(ContentBlock::class);
    }

    public static function hasContentTables(): bool
    {
        try {
            return Schema::hasTable('pages') && Schema::hasTable('content_blocks');
        } catch (\Throwable) {
            return false;
        }
    }

    public static function fallback(string $slug, string $name = ''): self
    {
        $page = new self([
            'slug' => $slug,
            'name' => $name,
        ]);

        $page->setRelation('contentBlocks', new Collection());

        return $page;
    }

    public static function resolvePublicPage(string $slug, string $name = ''): self
    {
        if (!self::hasContentTables()) {
            return self::fallback($slug, $name);
        }

        try {
            return self::with('contentBlocks')->firstOrCreate(
                ['slug' => $slug],
                ['name' => $name]
            );
        } catch (\Throwable) {
            return self::fallback($slug, $name);
        }
    }

    public function getBlock($key, $default = '')
    {
        return $this->contentBlocks->firstWhere('key', $key)?->value ?? $default;
    }

    public function getBlockSrc($key, $default = null)
    {
        $value = $this->getBlock($key, $default);
        return self::resolveBlockSrc($value);
    }

    public static function resolveBlockSrc($value)
    {
        if (!$value)
            return null;

        if (str_starts_with($value, 'http')) {
            return $value;
        }

        // If already starts with /storage/, return as-is
        if (str_starts_with($value, '/storage/')) {
            return $value;
        }

        // Legacy public assets
        if (str_starts_with($value, 'img/')) {
            return asset($value);
        }

        // Storage assets - normalize path
        return asset('storage/' . ltrim($value, '/'));
    }
}
