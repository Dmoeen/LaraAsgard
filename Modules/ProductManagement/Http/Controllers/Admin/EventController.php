<?php

namespace Modules\ProductManagement\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\URL;
use Modules\ProductManagement\Entities\Event;
use Modules\ProductManagement\Http\Requests\CreateEventRequest;
use Modules\ProductManagement\Http\Requests\UpdateEventRequest;
use Modules\ProductManagement\Repositories\EventRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\ProductManagement\Repositories\GlobalRepository;

class EventController extends AdminBaseController
{
    /**
     * @var EventRepository
     */
    private $event;
    /**
     * @var GlobalRepository
     */
    private $globalRepository;

    public function __construct(
        EventRepository $event,
        GlobalRepository $globalRepository
    )
    {
        parent::__construct();

        $this->event = $event;
        $this->globalRepository = $globalRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $events = $this->event->getEvents();

        return view('productmanagement::admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('productmanagement::admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateEventRequest $request
     * @return Response
     */
    public function store(CreateEventRequest $request)
    {
        $event= $this->event->create($request->all());
        $this->globalRepository->storeImage($event,$request,'EVENT');

        return redirect()->route('admin.productmanagement.event.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('productmanagement::events.title.events')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Response
     */
    public function edit(Event $event)
    {

        $event = $this->event->getEventById($event->id);
        return view('productmanagement::admin.events.edit', compact('event'));
    }

    public function update(Event $event, UpdateEventRequest $request)
    {

        if ($request->hasFile('image')){
            $this->event->update($event, $request->all());
            $singleEvent=$this->event->getEventById($event->id);
            $this->globalRepository->updateImage($singleEvent,$request,'EVENT');
        }else{
            $this->event->update($event, $request->all());
        }

        return redirect()->route('admin.productmanagement.event.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('productmanagement::events.title.events')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return Response
     */
    public function destroy(Event $event)
    {
        $this->event->destroy($event);
        $image=$event->Images->image_name;
        $event->Images->delete();
        $this->globalRepository->deleteImage($image);

        return redirect()->route('admin.productmanagement.event.index')
            ->withSuccess(trans('core::core.messages.resource deleted',
                ['name' => trans('productmanagement::events.title.events')]));
    }
}
