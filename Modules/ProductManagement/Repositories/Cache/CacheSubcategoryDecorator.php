<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\SubcategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSubcategoryDecorator extends BaseCacheDecorator implements SubcategoryRepository
{
    public function __construct(SubcategoryRepository $subcategory)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.subcategories';
        $this->repository = $subcategory;
    }
}
