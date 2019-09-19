<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Modules\ProductManagement\Entities\Subcategory;
use Modules\ProductManagement\Http\Requests\CreateSubcategoryRequest;
use Modules\ProductManagement\Http\Requests\UpdateSubcategoryRequest;
use Modules\ProductManagement\Repositories\CategoryRepository;
use Modules\ProductManagement\Repositories\SubcategoryRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SubcategoryController extends AdminBaseController
{
    /**
     * @var SubcategoryRepository
     */
    private $subcategory;
    private $category;

    public function __construct(
        SubcategoryRepository $subcategory,
         CategoryRepository $categoryRepository
    )
    {
        parent::__construct();

        $this->subcategory = $subcategory;
        $this->category=$categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $subcategories = $this->subcategory->getcategory();
//        dd($this->subcategory->getcategory()->name);

        return view('productmanagement::admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productmanagement::admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSubcategoryRequest $request
     * @return Response
     */
    public function store(CreateSubcategoryRequest $request)
    {
        $this->subcategory->create($request->all());

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Subcategory $subcategory
     * @return Response
     */
    public function edit(Subcategory $subcategory)
    {
        return view('productmanagement::admin.subcategories.edit', compact('subcategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Subcategory $subcategory
     * @param  UpdateSubcategoryRequest $request
     * @return Response
     */
    public function update(Subcategory $subcategory, UpdateSubcategoryRequest $request)
    {
        $this->subcategory->update($subcategory, $request->all());

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Subcategory $subcategory
     * @return Response
     */
    public function destroy(Subcategory $subcategory)
    {
        $this->subcategory->destroy($subcategory);

        return redirect()->route('admin.productmanagement.subcategory.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::subcategories.title.subcategories')]));
    }
}
