<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function label()
    {
        return $this->belongsTo(Label::class);
    }

    public function scopeWithAll($query)
    {
        $query->with(['pictures', 'category', 'label']);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name_en);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->name_en);
        });

    }
}
