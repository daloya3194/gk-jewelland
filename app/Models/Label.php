<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Label extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($label) {
            $label->slug = Str::slug($label->name);
        });

        static::updating(function ($label) {
            $label->slug = Str::slug($label->name);
        });

    }
}
