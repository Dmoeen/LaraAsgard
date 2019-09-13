<?php

namespace Modules\Usermanagement\Entities;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'usermanagement__category_translations';
}
