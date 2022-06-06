<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function active_products()
    {
        return $this->products()->where('status', '=', 1);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->name_en);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->name_en);
        });

    }
}
