<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['title', 'description', 'file_path', 'section', 'is_visible'];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
