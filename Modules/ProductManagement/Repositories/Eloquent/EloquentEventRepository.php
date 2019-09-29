<?php

namespace Modules\ProductManagement\Repositories\Eloquent;

use Modules\ProductManagement\Repositories\EventRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentEventRepository extends EloquentBaseRepository implements EventRepository
{

    public function getEvents()
    {
        return
            $this->model
                ->select('productmanagement__events.*','sacha__images.image_name')
                ->join('sacha__images','sacha__images.access_id','productmanagement__events.id')
                ->where('sacha__images.image_tag','=','EVENT')
                ->orderBy('productmanagement__events.id', 'desc')
                ->get();
    }

    public function getEventById($eventId)
    {
        return
            $this->model
                ->select('productmanagement__events.*','sacha__images.image_name')
                ->join('sacha__images','sacha__images.access_id','productmanagement__events.id')
                ->where('sacha__images.image_tag','=','EVENT')
                ->where('productmanagement__events.id','=',$eventId)
                ->first();
    }
}
