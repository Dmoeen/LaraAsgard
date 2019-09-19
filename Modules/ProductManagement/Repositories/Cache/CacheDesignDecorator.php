<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\DesignRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDesignDecorator extends BaseCacheDecorator implements DesignRepository
{
    public function __construct(DesignRepository $design)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.designs';
        $this->repository = $design;
    }
}
