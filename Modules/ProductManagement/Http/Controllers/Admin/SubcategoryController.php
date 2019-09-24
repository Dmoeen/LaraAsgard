<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;
use Modules\ProductManagement\Entities\Subcategory;
use Modules\ProductManagement\Http\Requests\CreateSubcategoryRequest;
use Modules\ProductManagement\Http\Requests\UpdateSubcategoryRequest;
use Modules\ProductManagement\Repositories\CategoryRepository;
use Modules\ProductManagement\Repositories\SubcategoryRepository;

class SubcategoryController extends AdminBaseController
{
    /**
     * @var SubcategoryRepository
     */
    private $subcategory;
    private $category;
    private $file;

    public function __construct(
        SubcategoryRepository $subcategory,
         CategoryRepository $categoryRepository,
        FileRepository $fileRepository
    )
    {
        parent::__construct();

        $this->subcategory = $subcategory;
        $this->category=$categoryRepository;
        $this->file=$fileRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index()
    {
        $subcategories = $this->subcategory->getcategory();

        $subcategory=$this->subcategory->all();

      return view('productmanagement::admin.subcategories.index', compact('subcategory','subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categorys=$this->subcategory->getAllCategoriesForDropDown();
        $subcategory = new Subcategory();


        return view('productmanagement::admin.subcategories.create',compact('subcategory','categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSubcategoryRequest $request
     * @return Response
     */
    public function store(CreateSubcategoryRequest $request)
    {


        $subcategory=$this->subcategory->create($request->all());
        $subcategory_images=$this->file->findFileByZoneForEntity('subcategory_images',$subcategory);
        dd($subcategory_images->path);
        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }

    public function edit(Subcategory $subcategory)
    {
        return view('productmanagement::admin.subcategories.edit', compact('subcategory'));
    }

    public function update(Subcategory $subcategory, UpdateSubcategoryRequest $request)
    {


        $this->subcategory->update($subcategory, $request->all());

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }

    public function destroy(Subcategory $subcategory)
    {
        $this->subcategory->destroy($subcategory);

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }
}
