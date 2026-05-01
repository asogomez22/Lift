<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = ['slug', 'name'];

    public function contentBlocks()
    {
        return $this->hasMany(ContentBlock::class);
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