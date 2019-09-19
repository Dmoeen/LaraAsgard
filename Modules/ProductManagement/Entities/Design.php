<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__designs';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'photo',
        'price',
        'status'
    ];
}
