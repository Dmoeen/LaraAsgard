<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\IcingRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheIcingDecorator extends BaseCacheDecorator implements IcingRepository
{
    public function __construct(IcingRepository $icing)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.icings';
        $this->repository = $icing;
    }
}
