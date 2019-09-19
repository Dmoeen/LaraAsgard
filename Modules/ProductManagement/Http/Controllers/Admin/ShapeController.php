<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ProductManagement\Entities\Shape;
use Modules\ProductManagement\Http\Requests\CreateShapeRequest;
use Modules\ProductManagement\Http\Requests\UpdateShapeRequest;
use Modules\ProductManagement\Repositories\ShapeRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ShapeController extends AdminBaseController
{
    /**
     * @var ShapeRepository
     */
    private $shape;

    public function __construct(ShapeRepository $shape)
    {
        parent::__construct();

        $this->shape = $shape;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$shapes = $this->shape->all();

        return view('productmanagement::admin.shapes.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productmanagement::admin.shapes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateShapeRequest $request
     * @return Response
     */
    public function store(CreateShapeRequest $request)
    {
        $this->shape->create($request->all());

        return redirect()->route('admin.productmanagement.shape.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::shapes.title.shapes')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Shape $shape
     * @return Response
     */
    public function edit(Shape $shape)
    {
        return view('productmanagement::admin.shapes.edit', compact('shape'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Shape $shape
     * @param  UpdateShapeRequest $request
     * @return Response
     */
    public function update(Shape $shape, UpdateShapeRequest $request)
    {
        $this->shape->update($shape, $request->all());

        return redirect()->route('admin.productmanagement.shape.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::shapes.title.shapes')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Shape $shape
     * @return Response
     */
    public function destroy(Shape $shape)
    {
        $this->shape->destroy($shape);

        return redirect()->route('admin.productmanagement.shape.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::shapes.title.shapes')]));
    }
}
