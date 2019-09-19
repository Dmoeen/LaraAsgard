<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__categories';

    public $translatedAttributes = [];
    protected $fillable = ['name'];


    public function subcategories()
    {
        return $this->hasMany(Subcategory::class,'category_id');
    }

}
