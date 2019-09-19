<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\ColorRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheColorDecorator extends BaseCacheDecorator implements ColorRepository
{
    public function __construct(ColorRepository $color)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.colors';
        $this->repository = $color;
    }
}
