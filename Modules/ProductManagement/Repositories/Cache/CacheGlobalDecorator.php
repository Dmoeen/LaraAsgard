<?php


namespace Modules\ProductManagement\Repositories\Cache;


use Modules\Core\Repositories\Cache\BaseCacheDecorator;
use Modules\ProductManagement\Repositories\GlobalRepository;

class CacheGlobalDecorator extends BaseCacheDecorator implements GlobalRepository
{


    public function __construct(GlobalRepository $product)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.products';
        $this->repository = $product;
    }
}