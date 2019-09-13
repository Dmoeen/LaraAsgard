<?php

namespace Modules\Usermanagement\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $table = 'usermanagement__categories';
    public $translatedAttributes = [];
    protected $fillable = [];
}
