<?php

namespace Modules\ProductManagement\Repositories\Eloquent;


use Illuminate\Support\Facades\DB;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\ProductManagement\Entities\Subcategory;
use Modules\ProductManagement\Repositories\SubcategoryRepository;

class EloquentSubcategoryRepository extends EloquentBaseRepository implements SubcategoryRepository
{


    public function getcategory()
    {
        return $this->model
            ->select('productmanagement__subcategories.*','productmanagement__categories.name as c_name')
            ->join('productmanagement__categories','productmanagement__categories.id','productmanagement__subcategories.category_id')
            ->where('productmanagement__subcategories.status','=',1)->get();

    }
}
