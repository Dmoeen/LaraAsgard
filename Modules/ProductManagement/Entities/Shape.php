<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Shape extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__shapes';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'photo',
        'price',
        'status'
    ];
}
