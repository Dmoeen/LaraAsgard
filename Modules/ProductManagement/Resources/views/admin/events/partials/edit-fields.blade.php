<div class="box-body">
    <p>
    {!! Form::normalInput('name', 'Event Name',$errors,$event) !!}
    <div class="form-group"{{ $errors->has("status") ? ' has-error' : '' }} >
        <!-- Status input -->
        <label>Event Status</label><br/>
        <?php $old = $event->status ? $event->status : 0 ?>
        {{--<input id="status" name="status" type="checkbox" class="flat-blue" {{ (is_null(old("status",$old))) ?: 'checked' }} value="1"/>--}}
        <input id="status" name="status" type="radio" class="flat-blue" value="1" {{ (old("status",$old) && $old == 0) ?: 'checked' }}/>
        {{trans('productmanagement::subcategories.attributes.statuses.1')}}
        <input id="status" name="status" type="radio" class="flat-blue" value="0" {{ (old("status",$old) && $old == 1) ?: 'checked' }}/>
        {{trans('productmanagement::subcategories.attributes.statuses.0')}}
        {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
    </div>

    <div class="form-group">
        <label>Start Date:</label>

        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="start_date" value="{{$event->start_date}}" class="form-control pull-right datepicker" >
        </div>
        <!-- /.input group -->
    </div>

    <div class="form-group">
        <label>End Date:</label>

        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" name="end_date" value="{{$event->end_date}}" class="form-control pull-right datepicker" >
        </div>
        <!-- /.input group -->
    </div>
    </p>

    <div class="form-group  d-flex flex-column py-3">
        <label for="image"> Event Image</label>
        <input type="file" name="image" class="py-3"/>
        <div>{{$errors->first('image')}}</div>

    </div>
    <div >
        <td><img class="img-thumbnail" src="{{\Illuminate\Support\Facades\URL::to('/').'/images/'.$event->image_name}}" alt="Smiley face" height="150" width="150"></td>
    </div>
</div>


