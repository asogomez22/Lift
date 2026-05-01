<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'description', 'image_path', 'cover_image', 'tags', 'display_order'];

    /**
     * Get project gallery images
     */
    public function images()
    {
        return $this->hasMany(ProjectImage::class)->orderBy('display_order');
    }

    /**
     * Scope for ordering projects by display_order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('display_order')->orderBy('created_at', 'desc');
    }

    /**
     * Get image URL
     */
    public function getImageUrlAttribute()
    {
        if (str_starts_with($this->image_path, 'projects/')) {
            return \Illuminate\Support\Facades\Storage::url($this->image_path);
        }
        return asset($this->image_path);
    }

    /**
     * Get tags as array
     */
    public function getTagsArrayAttribute()
    {
        return $this->tags ? array_filter(array_map('trim', explode(',', $this->tags))) : [];
    }
}
