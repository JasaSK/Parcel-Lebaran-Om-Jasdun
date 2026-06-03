<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagePath extends Model
{
    protected $table = 'image_product';
    protected $fillable = ['product_id', 'image_path'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
