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
}
