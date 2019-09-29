<div class="box-body">
    <p>
        {!! Form::normalInput('name', 'SubCategory Name',$errors,$subcategory) !!}


    <div class="form-group d-flex"{{ $errors->has("status") ? ' has-error' : '' }} >
        <!-- Status input -->
        <label>{{ trans('productmanagement::subcategories.attributes.status') }}</label><br/>

        <?php $old = $subcategory->status ? $subcategory->status : 0 ?>
        {{--<input id="status" name="status" type="checkbox" class="flat-blue" {{ (is_null(old("status",$old))) ?: 'checked' }} value="1"/>--}}
        <input id="status" name="status" type="radio" class="flat-blue" value="1" {{ (old("status",$old) && $old == 0) ?: 'checked' }}/>
        {{trans('productmanagement::subcategories.attributes.statuses.1')}}
        <input id="status" name="status" type="radio" class="flat-blue" value="0" {{ (old("status",$old) && $old == 1) ?: 'checked' }}/>
        {{trans('productmanagement::subcategories.attributes.statuses.0')}}
        {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
    </div>


    </p>
    <div class="form-group  d-flex flex-column py-3">
        <label for="image"> Subcategory Image</label>
        <input type="file" name="image" class="py-3"/>
        <div>{{$errors->first('image')}}</div>

    </div>
</div>
