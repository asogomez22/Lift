<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    protected $fillable = ['project_id', 'image_path', 'display_order'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getImageUrlAttribute()
    {
        return \Illuminate\Support\Facades\Storage::url($this->image_path);
    }
}
