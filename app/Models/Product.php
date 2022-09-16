<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','rating','description','details','colors'];

    protected $casts = [
        'details' => 'array',
        'colors' => 'array',
    ];



    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function oldestImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->oldestOfMany();
    }


    public function scopeSearch(Builder $query, $value): void
    {
        $query->whereLike(['name'], $value);
    }
}
