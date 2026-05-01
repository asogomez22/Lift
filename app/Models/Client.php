<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'logo_path', 'display_order'];

    /**
     * Scope for ordering clients by display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order');
    }
}
