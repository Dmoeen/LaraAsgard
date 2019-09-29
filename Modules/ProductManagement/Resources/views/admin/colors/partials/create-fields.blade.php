<div class="box-body">

    {!! Form::normalInput('name', 'Color Name',$errors) !!}


    <div class="form-group  d-flex flex-column py-3">
        <label for="image"> Color Image</label>
        <input type="file" name="image" class="py-3"/>
        <div>{{$errors->first('image')}}</div>
    </div>
    <div class="form-group">
        <label>Price $</label>
        <div class="input-group ">
            <div class="input-group-addon">
                <i class="fa fa-money"></i>
            </div>
            <input class="form-control form-control-lg" type="number" name="price" placeholder="Price"
                   min="0">
        </div>
    </div>



    <div class="form-group d-flex"{{ $errors->has("status") ? ' has-error' : '' }} >
        <label>Color Status</label><br/>
        <input id="status" name="status" type="radio" class="flat-blue" value="1"/>
        {{trans('productmanagement::subcategories.attributes.statuses.1')}}
        <input id="status" name="status" type="radio" class="flat-blue" value="0"/>
        {{trans('productmanagement::subcategories.attributes.statuses.0')}}
        {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
    </div>
</div>


