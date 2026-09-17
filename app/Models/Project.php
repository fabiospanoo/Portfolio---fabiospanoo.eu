<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'text', 'url', 'image', 'tags'];

    protected function casts(): array
    {
        return [
            'tags' => 'array',
        ];
    }
}