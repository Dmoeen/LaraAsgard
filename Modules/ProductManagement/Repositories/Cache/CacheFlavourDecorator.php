<?php

namespace Modules\ProductManagement\Repositories\Cache;

use Modules\ProductManagement\Repositories\FlavourRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheFlavourDecorator extends BaseCacheDecorator implements FlavourRepository
{
    public function __construct(FlavourRepository $flavour)
    {
        parent::__construct();
        $this->entityName = 'productmanagement.flavours';
        $this->repository = $flavour;
    }
}
