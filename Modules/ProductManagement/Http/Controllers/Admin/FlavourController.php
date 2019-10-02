<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ProductManagement\Entities\Flavour;
use Modules\ProductManagement\Http\Requests\CreateFlavourRequest;
use Modules\ProductManagement\Http\Requests\UpdateFlavourRequest;
use Modules\ProductManagement\Repositories\FlavourRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\ProductManagement\Repositories\GlobalRepository;

class FlavourController extends AdminBaseController
{
    /**
     * @var FlavourRepository
     */
    private $flavour;
    /**
     * @var GlobalRepository
     */
    private $globalRepository;

    public function __construct(FlavourRepository $flavour, GlobalRepository $globalRepository)
    {
        parent::__construct();

        $this->flavour = $flavour;
        $this->globalRepository = $globalRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $flavours = $this->flavour->getFlavours();

        return view('productmanagement::admin.flavours.index', compact('flavours'));
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
     * @param CreateFlavourRequest $request
     * @return Response
     */
    public function store(CreateFlavourRequest $request)
    {
        $flavour = $this->flavour->create($request->all());
        $this->globalRepository->storeImage($flavour, $request, 'FLAVOUR');

        return redirect()->route('admin.productmanagement.flavour.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::flavours.title.flavours')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Flavour $flavour
     * @return Response
     */
    public function edit(Flavour $flavour)
    {
        $flavour = $this->flavour->getFlavourbyId($flavour->id);
        return view('productmanagement::admin.flavours.edit', compact('flavour'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Flavour $flavour
     * @param UpdateFlavourRequest $request
     * @return Response
     */
    public function update(Flavour $flavour, UpdateFlavourRequest $request)
    {

        if ($request->hasFile('image')) {
            $this->flavour->update($flavour, $request->all());
            $singleEvent = $this->flavour->getFlavourbyId($flavour->id);
            $this->globalRepository->updateImage($singleEvent, $request, 'FLAVOUR');
        } else {
            $this->flavour->update($flavour, $request->all());
        }

        return redirect()->route('admin.productmanagement.flavour.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::flavours.title.flavours')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Flavour $flavour
     * @return Response
     */
    public function destroy(Flavour $flavour)
    {
        $this->flavour->destroy($flavour);
        $image = $flavour->Images->image_name;
        $flavour->Images->delete();
        $this->globalRepository->deleteImage($image);
        return redirect()->route('admin.productmanagement.flavour.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('productmanagement::flavours.title.flavours')]));
    }
}
