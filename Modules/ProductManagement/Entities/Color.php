<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__colors';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'photo',
        'price',
        'colortype_id'
    ];
}
