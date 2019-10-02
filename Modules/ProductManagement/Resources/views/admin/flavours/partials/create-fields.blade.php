<div class="box-body">

        {!! Form::normalInput('name', 'Flavour Name',$errors) !!}
        {!! Form::normalInput('price', 'Price $' ,$errors,'',array('class'=>'form-control form-control-lg','min'=>'0')) !!}
        <div class="form-group d-flex"{{ $errors->has("status") ? ' has-error' : '' }} >
                <label>Flavour Status</label><br/>
                <input id="status" name="status" type="radio" class="flat-blue" value="1"/>
                {{trans('productmanagement::subcategories.attributes.statuses.1')}}
                <input id="status" name="status" type="radio" class="flat-blue" value="0"/>
                {{trans('productmanagement::subcategories.attributes.statuses.0')}}
                {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
        </div>


        <div class="input-group date">
                <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                </div>
                {{ Form::text('expiry_date', 'Expiry Date', array('class' => 'datepicker'),$errors) }}
        </div>



        <div class="form-group  d-flex flex-column py-3">
                <label for="image"> Flavour Image</label>
                <input type="file" name="image" class="py-3"/>
                <div>{{$errors->first('image')}}</div>
        </div>
</div>


