<?php

namespace Modules\ProductManagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
//    use Translatable;

    protected $table = 'productmanagement__events';
    public $translatedAttributes = [];
    protected $fillable = [
        'name',
        'photo',
        'start_date',
        'end_date',
        'status',
        'sequence'
    ];

    public function  Images(){
        return $this->hasOne(AccessImages::class ,'access_id');
    }
    public function getStatusHtmlAttribute()
    {
        if($this->status) {return '<div class="cell"><i class="fa fa-circle text-success"></i></div>';}
        return '<div class="cell"><i class="fa fa-circle text-danger"></i></div>';
    }


}
