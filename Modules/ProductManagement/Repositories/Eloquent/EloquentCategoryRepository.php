<?php

namespace Modules\ProductManagement\Repositories\Eloquent;

use Modules\ProductManagement\Entities\Subcategory;
use Modules\ProductManagement\Repositories\CategoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCategoryRepository extends EloquentBaseRepository implements CategoryRepository
{

    public function subcategories()
    {
        return $this->model->hasMany(Subcategory::class);
    }
}
