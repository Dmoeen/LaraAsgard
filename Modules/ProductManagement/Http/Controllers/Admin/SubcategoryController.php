<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\ProductManagement\Entities\AccessImages;
use Modules\ProductManagement\Entities\Subcategory;
use Modules\ProductManagement\Http\Requests\CreateSubcategoryRequest;
use Modules\ProductManagement\Http\Requests\UpdateSubcategoryRequest;
use Modules\ProductManagement\Repositories\CategoryRepository;
use Modules\ProductManagement\Repositories\GlobalRepository;
use Modules\ProductManagement\Repositories\SubcategoryRepository;

class SubcategoryController extends AdminBaseController
{


    private $subcategory;
    private $category;

    private $globalRepository;

    public function __construct(
                                SubcategoryRepository $subcategory,
                                CategoryRepository $categoryRepository,
                                GlobalRepository $globalRepository
    )
    {
        parent::__construct();
        $this->subcategory = $subcategory;
        $this->category=$categoryRepository;
        $this->globalRepository = $globalRepository;
    }

    public function index()
    {
        $subcategories = $this->subcategory->getcategory();
//        $subcategory=$this->subcategory->all();
        return view('productmanagement::admin.subcategories.index', compact('subcategories'));
    }

    public function create()
    {
        $categorys=$this->subcategory->getAllCategoriesForDropDown();
        $subcategory = new Subcategory();
        return view('productmanagement::admin.subcategories.create',compact('subcategory','categorys'));
    }

    public function store(CreateSubcategoryRequest $request)
    {

        $subcategory=$this->subcategory->create($request->all());
      $this->globalRepository->storeImage($subcategory,$request,'SUBCATEGORY');
      return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }

    public function edit(Subcategory $subcategory)
    {
        $categorys=$this->subcategory->getAllCategoriesForDropDown();
        $subcategory = $this->subcategory->getSubcategoryById($subcategory->id);
        return view('productmanagement::admin.subcategories.edit', compact('subcategory','categorys'));
    }

    public function update(Subcategory $subcategory, UpdateSubcategoryRequest $request)
    {
        if ($request->hasFile('image')){
            $this->subcategory->update($subcategory, $request->all());
            $subcategor=$this->subcategory->getSubcategoryById($subcategory->id);
            $this->globalRepository->updateImage($subcategor,$request,'SUBCATEGORY');
        }else{
            $this->subcategory->update($subcategory, $request->all());
        }

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }

    public function destroy(Subcategory $subcategory)
    {

            $this->subcategory->destroy($subcategory);
            $image=$subcategory->Images->image_name;
            $subcategory->Images->delete();
            $this->globalRepository->deleteImage($image);

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }




}
