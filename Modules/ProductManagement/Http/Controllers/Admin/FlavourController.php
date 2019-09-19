<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ProductManagement\Entities\Flavour;
use Modules\ProductManagement\Http\Requests\CreateFlavourRequest;
use Modules\ProductManagement\Http\Requests\UpdateFlavourRequest;
use Modules\ProductManagement\Repositories\FlavourRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class FlavourController extends AdminBaseController
{
    /**
     * @var FlavourRepository
     */
    private $flavour;

    public function __construct(FlavourRepository $flavour)
    {
        parent::__construct();

        $this->flavour = $flavour;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$flavours = $this->flavour->all();

        return view('productmanagement::admin.flavours.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productmanagement::admin.flavours.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateFlavourRequest $request
     * @return Response
     */
    public function store(CreateFlavourRequest $request)
    {
        $this->flavour->create($request->all());

        return redirect()->route('admin.productmanagement.flavour.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::flavours.title.flavours')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Flavour $flavour
     * @return Response
     */
    public function edit(Flavour $flavour)
    {
        return view('productmanagement::admin.flavours.edit', compact('flavour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Flavour $flavour
     * @param  UpdateFlavourRequest $request
     * @return Response
     */
    public function update(Flavour $flavour, UpdateFlavourRequest $request)
    {
        $this->flavour->update($flavour, $request->all());

        return redirect()->route('admin.productmanagement.flavour.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::flavours.title.flavours')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Flavour $flavour
     * @return Response
     */
    public function destroy(Flavour $flavour)
    {
        $this->flavour->destroy($flavour);

        return redirect()->route('admin.productmanagement.flavour.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::flavours.title.flavours')]));
    }
}
