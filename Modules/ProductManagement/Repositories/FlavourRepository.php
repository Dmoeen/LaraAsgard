<?php

namespace Modules\ProductManagement\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface FlavourRepository extends BaseRepository
{

    public function getFlavours();
    public function getFlavourbyId($flavourId);
}
