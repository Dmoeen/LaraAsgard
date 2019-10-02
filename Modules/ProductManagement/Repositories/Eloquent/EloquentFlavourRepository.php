<?php

namespace Modules\ProductManagement\Repositories\Eloquent;

use Modules\ProductManagement\Repositories\FlavourRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentFlavourRepository extends EloquentBaseRepository implements FlavourRepository
{
    public function getFlavours()
    {
        return
            $this->model
                ->select('productmanagement__flavours.*','sacha__images.image_name')
                ->join('sacha__images','sacha__images.access_id','productmanagement__flavours.id')
                ->where('sacha__images.image_tag','=','FLAVOUR')
                ->orderBy('productmanagement__flavours.id', 'desc')
                ->get();
    }

    public function getFlavourbyId($flavourId)
    {
        return
            $this->model
                ->select('productmanagement__flavours.*','sacha__images.image_name')
                ->join('sacha__images','sacha__images.access_id','productmanagement__flavours.id')
                ->where('sacha__images.image_tag','=','FLAVOUR')
                ->where('productmanagement__flavours.id','=',$flavourId)
                ->first();
    }
}
