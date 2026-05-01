<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'formula',
        'parameters',
        'category',
        'is_active',
        'display_order',
    ];

    protected $casts = [
        'parameters' => 'array',
        'is_active' => 'boolean',
    ];

    /**
     * Scope to get only active formulas
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope to get formulas ordered by display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order', 'asc')->orderBy('id', 'asc');
    }
}
