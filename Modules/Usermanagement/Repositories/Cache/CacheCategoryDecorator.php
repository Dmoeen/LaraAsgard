<?php

namespace Modules\Usermanagement\Repositories\Cache;

use Modules\Usermanagement\Repositories\CategoryRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCategoryDecorator extends BaseCacheDecorator implements CategoryRepository
{
    public function __construct(CategoryRepository $category)
    {
        parent::__construct();
        $this->entityName = 'usermanagement.categories';
        $this->repository = $category;
    }
}
