<?php

namespace Modules\ProductManagement\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Subcategory extends Model
{

    use MediaRelation;

    const ACTIVE = 1;
    const INACTIVE = 0;

    const STATUSES = [
        self::ACTIVE   => 'Active',
        self::INACTIVE => 'Inactive',
    ];

    protected $table = 'productmanagement__subcategories';

    public $translatedAttributes = [];
    protected $fillable = [
        'category_id',
        'name',
        'photo',
        'status'
    ];
    public function  Images(){
        return $this->hasOne(AccessImages::class ,'access_id');
    }

    public function getStatusTextAttribute()
    {
        $status = trans('productmanagement::subcategories.statuses.'.$this->status);
        return ucfirst($status);
    }

    public function getStatusHtmlAttribute()
    {
        if($this->status) {return '<div class="cell"><i class="fa fa-circle text-success"></i></div>';}
        return '<div class="cell"><i class="fa fa-circle text-danger"></i></div>';
    }


}
