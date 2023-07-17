<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = "type_products";

    public function Product()
    {
        return $this->hasMany(Product::class, "id_type", "id");
    }
}
