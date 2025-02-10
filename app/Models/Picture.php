<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    protected static function boot() {
        parent::boot();

        static::creating(function ($picture) {
            $picture->complete_path ?? Storage::url($picture->path);
        });

        static::updating(function ($picture) {
            $picture->complete_path ?? Storage::url($picture->path);
        });

    }
}
