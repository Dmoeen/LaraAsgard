<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\ProductRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheProductDecorator extends BaseCacheDecorator implements ProductRepository
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.products';
        $this->repository = $product;
    }
}
