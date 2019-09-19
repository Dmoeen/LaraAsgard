<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\ShapeRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheShapeDecorator extends BaseCacheDecorator implements ShapeRepository
{
    public function __construct(ShapeRepository $shape)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.shapes';
        $this->repository = $shape;
    }
}
