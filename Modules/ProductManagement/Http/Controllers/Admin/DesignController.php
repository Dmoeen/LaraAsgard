<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ProductManagement\Entities\Design;
use Modules\ProductManagement\Http\Requests\CreateDesignRequest;
use Modules\ProductManagement\Http\Requests\UpdateDesignRequest;
use Modules\ProductManagement\Repositories\DesignRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DesignController extends AdminBaseController
{
    /**
     * @var DesignRepository
     */
    private $design;

    public function __construct(DesignRepository $design)
    {
        parent::__construct();

        $this->design = $design;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$designs = $this->design->all();

        return view('productmanagement::admin.designs.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productmanagement::admin.designs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateDesignRequest $request
     * @return Response
     */
    public function store(CreateDesignRequest $request)
    {
        $this->design->create($request->all());

        return redirect()->route('admin.productmanagement.design.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::designs.title.designs')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Design $design
     * @return Response
     */
    public function edit(Design $design)
    {
        return view('productmanagement::admin.designs.edit', compact('design'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Design $design
     * @param  UpdateDesignRequest $request
     * @return Response
     */
    public function update(Design $design, UpdateDesignRequest $request)
    {
        $this->design->update($design, $request->all());

        return redirect()->route('admin.productmanagement.design.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::designs.title.designs')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Design $design
     * @return Response
     */
    public function destroy(Design $design)
    {
        $this->design->destroy($design);

        return redirect()->route('admin.productmanagement.design.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::designs.title.designs')]));
    }
}
