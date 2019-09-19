<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Icing extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__icings';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'price',
        'status'
    ];
}
