<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'meta_description',
        'content',
        'is_active',
        'show_in_header',
        'show_in_footer',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'show_in_header' => 'boolean',
        'show_in_footer' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeHeader($query)
    {
        return $query->where('show_in_header', true);
    }

    public function scopeFooter($query)
    {
        return $query->where('show_in_footer', true);
    }

    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->first();
    }
}
