<?php

namespace Modules\ProductManagement\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface CategoryRepository extends BaseRepository
{
    public function subcategories();
}
