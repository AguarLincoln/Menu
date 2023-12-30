<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'data',
        'active',
    ];

    protected $casts = [
        'data' => ArrayObject::class,
        'active' => 'boolean',
    ];

    public function layout(): HasMany
    {
        return $this->hasMany(MenuLayout::class);
    }
}
