<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.categories';
        $this->repository = $category;
    }
}
