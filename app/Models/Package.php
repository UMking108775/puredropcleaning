<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'name',
        'type',
        'price',
        'unit_label',
        'schedule_visits',
        'schedule_hours',
        'features',
        'badge_text',
        'is_highlighted',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'features'       => 'array',
        'price'          => 'decimal:2',
        'is_highlighted' => 'boolean',
        'is_active'      => 'boolean',
    ];

    public const TYPES = [
        'hourly'  => 'Hourly',
        'weekly'  => 'Weekly',
        'monthly' => 'Monthly',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

    public function scopeOfType($query, string $type)
    {
        return $query->where('type', $type);
    }

    public function getTypeLabelAttribute(): string
    {
        return self::TYPES[$this->type] ?? ucfirst($this->type);
    }
}
