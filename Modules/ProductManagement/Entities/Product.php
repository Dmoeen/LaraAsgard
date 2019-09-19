<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__products';
    public $translatedAttributes = [];
    protected $fillable = [
        'product_id',
        'name',
        'price',
        'tier',
        'weight',
        'description',
        'photo',
        'status',
        'customizable',
        'sequence',
        'quantity',
        'text',
        'icing_id',
        'category_id'
    ];
}
