<?php

namespace Modules\ProductManagement\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface SubcategoryRepository extends BaseRepository
{
    public function getcategory();
}