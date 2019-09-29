<?php


namespace Modules\ProductManagement\Repositories;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Internationalisation\BaseFormRequest;
use Modules\Core\Repositories\BaseRepository;

interface GlobalRepository extends BaseRepository
{
    public function updateImage(Model $any,BaseFormRequest $request,$tag);
    public function storeImage(Model $any,BaseFormRequest $request,$tag);
}