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

    public function getStatusHtmlAttribute()
    {
        if($this->status) {return '<div class="cell"><i class="fa fa-circle text-success"></i></div>';}
        return '<div class="cell"><i class="fa fa-circle text-danger"></i></div>';
    }
}
