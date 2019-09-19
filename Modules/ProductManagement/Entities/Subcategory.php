<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__subcategories';

    public $translatedAttributes = [];
    protected $fillable = [
        'category_id',
        'name',
        'photo',
        'status'
    ];



}
