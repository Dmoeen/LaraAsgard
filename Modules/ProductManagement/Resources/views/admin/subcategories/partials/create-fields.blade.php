<div class="box-body">

        {!! Form::normalInput('name', 'SubCategory Name',$errors) !!}


    <div class="form-group d-flex"{{ $errors->has("status") ? ' has-error' : '' }} >
        <!-- Status input -->
        <label>{{ trans('productmanagement::subcategories.attributes.status') }}</label><br/>

        {{--<input id="status" name="status" type="checkbox" class="flat-blue" {{ (is_null(old("status",$old))) ?: 'checked' }} value="1"/>--}}
        <input id="status" name="status" type="radio" class="flat-blue" value="1"/>
        {{trans('productmanagement::subcategories.attributes.statuses.1')}}
        <input id="status" name="status" type="radio" class="flat-blue" value="0" />
        {{trans('productmanagement::subcategories.attributes.statuses.0')}}
        {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
    </div>






    <div class="form-group  d-flex flex-column py-3">
        <label for="image"> Subcategory Image</label>
        <input type="file" name="image" class="py-3"/>
        <div>{{$errors->first('image')}}</div>

    </div>
</div>
