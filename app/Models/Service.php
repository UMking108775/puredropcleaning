<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Service extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'features',
        'full_content',
        'meta_description',
        'image',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function getImageUrlAttribute()
    {
        if ($this->image) {
            return asset('services%20images/' . $this->image);
        }
        return asset('services%20images/1.png');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });

        static::updating(function ($service) {
            if (empty($service->slug)) {
                $service->slug = Str::slug($service->title);
            }
        });
    }
}
