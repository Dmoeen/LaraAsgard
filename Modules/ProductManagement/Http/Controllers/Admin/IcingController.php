<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ProductManagement\Entities\Icing;
use Modules\ProductManagement\Http\Requests\CreateIcingRequest;
use Modules\ProductManagement\Http\Requests\UpdateIcingRequest;
use Modules\ProductManagement\Repositories\IcingRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class IcingController extends AdminBaseController
{
    /**
     * @var IcingRepository
     */
    private $icing;

    public function __construct(IcingRepository $icing)
    {
        parent::__construct();

        $this->icing = $icing;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$icings = $this->icing->all();

        return view('productmanagement::admin.icings.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productmanagement::admin.icings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateIcingRequest $request
     * @return Response
     */
    public function store(CreateIcingRequest $request)
    {
        $this->icing->create($request->all());

        return redirect()->route('admin.productmanagement.icing.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::icings.title.icings')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Icing $icing
     * @return Response
     */
    public function edit(Icing $icing)
    {
        return view('productmanagement::admin.icings.edit', compact('icing'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Icing $icing
     * @param  UpdateIcingRequest $request
     * @return Response
     */
    public function update(Icing $icing, UpdateIcingRequest $request)
    {
        $this->icing->update($icing, $request->all());

        return redirect()->route('admin.productmanagement.icing.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::icings.title.icings')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Icing $icing
     * @return Response
     */
    public function destroy(Icing $icing)
    {
        $this->icing->destroy($icing);

        return redirect()->route('admin.productmanagement.icing.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::icings.title.icings')]));
    }
}
