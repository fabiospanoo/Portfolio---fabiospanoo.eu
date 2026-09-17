<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCredential extends Model
{
    protected $fillable = ['totp_secret', 'totp_confirmed_at', 'last_login_at'];

    protected function casts(): array
    {
        return [
            'totp_confirmed_at' => 'datetime',
            'last_login_at' => 'datetime',
        ];
    }

    public static function current(): self
    {
        return static::query()->firstOrCreate([]);
    }
}