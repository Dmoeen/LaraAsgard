<?php

namespace Modules\ProductManagement\Repositories\Eloquent;


use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\ProductManagement\Entities\Category;
use Modules\ProductManagement\Events\SubcategoryWasCreated;
use Modules\ProductManagement\Repositories\SubcategoryRepository;

class EloquentSubcategoryRepository extends EloquentBaseRepository implements SubcategoryRepository
{


    public function getcategory()
    {
        return
            $this->model
            ->select('productmanagement__subcategories.*','productmanagement__categories.name as c_name','sacha__images.image_name')
            ->join('productmanagement__categories','productmanagement__categories.id','productmanagement__subcategories.category_id')
            ->join('sacha__images','sacha__images.access_id','productmanagement__subcategories.id')
                ->where('sacha__images.image_tag','=','SUBCATEGORY')
                ->orderBy('productmanagement__subcategories.id', 'desc')
            ->get();
    }

    public function getAllCategoriesForDropDown()
    {
        $res = Category::pluck('name','id');
        return $res;
    }

    public function create($data)
    {
        $subcategory= $this->model->create($data);
        event(new SubcategoryWasCreated($subcategory,$data));
        return $subcategory;
    }
    public function update($model, $data)
    {
        $subcategory= $model->update($data);
        return $subcategory;
    }

    public function getSubcategory(){
        return $this->model;
    }


    public function getSubcategoryById($id)
    {

        return $this->model
            ->select('productmanagement__subcategories.*','productmanagement__categories.name as c_name','sacha__images.image_name')
            ->join('productmanagement__categories','productmanagement__categories.id','productmanagement__subcategories.category_id')
            ->join('sacha__images','sacha__images.access_id','productmanagement__subcategories.id')
            ->where('sacha__images.image_tag','=','SUBCATEGORY')
            ->where('productmanagement__subcategories.id','=',$id)->first();
    }
}
