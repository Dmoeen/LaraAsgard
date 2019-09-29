<?php


namespace Modules\ProductManagement\Repositories\Eloquent;


use Illuminate\Database\Eloquent\Model;
use Modules\Core\Internationalisation\BaseFormRequest;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\ProductManagement\Entities\AccessImages;
use Modules\ProductManagement\Repositories\GlobalRepository;

class EloquentGlobalRepository extends EloquentBaseRepository implements GlobalRepository
{
    // for storing subcategory images //
    public function storeImage(Model $any,BaseFormRequest $request,$tag){

        if ($request->has('image')){
            $image = $request->file('image');
            $name = date('mdYHis') . uniqid().$image->getClientOriginalName();
            $id = $any->id;
            $destinationPath = public_path('storage/media');
            $image->move($destinationPath, $name);
            $newImage = new AccessImages();
            $newImage->image_name = $name;
            $newImage->image_path = $destinationPath;
            $newImage->access_id = $id;
            $newImage->image_tag = $tag;
            $any->Images()->save($newImage);
        }

    }


    // for updating subcategory images //
    public  function updateImage(Model $any,BaseFormRequest $request,$tag){

        $previousImage = $_SERVER['DOCUMENT_ROOT']."/storage/media/{$any->image_name}";
        if (file_exists($previousImage)) {unlink($previousImage);}
        $image = $request->file('image');
        $name = date('mdYHis') . uniqid().$image->getClientOriginalName();
        $id = $any->id;
        $destinationPath = public_path('storage/media');
        $image->move($destinationPath, $name);
        $newImage = new AccessImages();
        $newImage->image_name = $name;
        $newImage->image_path = $destinationPath;
        $newImage->access_id = $id;
        $newImage->image_tag = $tag;
        $any->Images()->update($newImage->toArray());
    }
}