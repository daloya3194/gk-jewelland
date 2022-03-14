<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'folder',
        'filename',
        'path',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
