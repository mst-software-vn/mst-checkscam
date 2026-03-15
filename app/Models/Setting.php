<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'settings';

    protected $primaryKey = 'name';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'value',
    ];

    /**
     * ------------------------------------------------------
     * Static Helpers
     * ------------------------------------------------------
     */
    public static function getValue(string $key, mixed $default = null): mixed
    {
        $setting = static::find($key);

        return $setting ? $setting->value : $default;
    }

    public static function setValue(string $key, mixed $value): void
    {
        static::updateOrCreate(
            ['name' => $key],
            ['value' => $value],
        );
    }
}
