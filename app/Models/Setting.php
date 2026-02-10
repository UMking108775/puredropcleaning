<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Setting extends Model
{
    protected $fillable = ['key', 'value', 'group'];

    /**
     * Get a setting value by key, with optional default.
     */
    public static function get(string $key, $default = null)
    {
        $setting = Cache::remember("setting.{$key}", 3600, function () use ($key) {
            return static::where('key', $key)->first();
        });

        return $setting ? $setting->value : $default;
    }

    /**
     * Set a setting value by key.
     */
    public static function set(string $key, $value, string $group = 'general')
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        Cache::forget("setting.{$key}");

        return $setting;
    }

    /**
     * Get all settings for a group as key => value array.
     */
    public static function getGroup(string $group): array
    {
        $settings = Cache::remember("settings.group.{$group}", 3600, function () use ($group) {
            return static::where('group', $group)->pluck('value', 'key')->toArray();
        });

        return $settings;
    }

    /**
     * Clear group cache.
     */
    public static function clearGroupCache(string $group): void
    {
        Cache::forget("settings.group.{$group}");
    }
}
