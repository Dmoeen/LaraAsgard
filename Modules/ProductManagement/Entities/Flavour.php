<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__flavours';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'expiry_date',
        'photo',
        'price',
        'status'
    ];
}
