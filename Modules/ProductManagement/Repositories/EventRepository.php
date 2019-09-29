<?php

namespace Modules\ProductManagement\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface EventRepository extends BaseRepository
{

    public function getEvents();
    public function getEventById($eventId);
}
