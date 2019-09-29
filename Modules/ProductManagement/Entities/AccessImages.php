<?php


namespace Modules\ProductManagement\Entities;


use Illuminate\Database\Eloquent\Model;

class AccessImages extends Model
{
    protected $table = 'sacha__images';
    protected $fillable = [
        'image_name',
        'image_path',
        'access_id',
        'image_tag'
    ];

    public function subcategories()
    {
        return $this->belongsTo(Subcategory::class,'access_id');
    }

    public function events()
    {
        return $this->belongsTo(Event::class,'access_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class,'access_id');
    }

    public function flavours()
    {
        return $this->belongsTo(Flavour::class,'access_id');
    }

    public function designes()
    {
        return $this->belongsTo(Design::class,'access_id');
    }

    public function colors()
    {

        return $this->belongsTo(Color::class,'access_id');
    }

    public function shapes()
    {

        return $this->belongsTo(Shape::class,'access_id');
    }

}