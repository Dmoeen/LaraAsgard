<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\EventRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheEventDecorator extends BaseCacheDecorator implements EventRepository
{
    public function __construct(EventRepository $event)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.events';
        $this->repository = $event;
    }
}
