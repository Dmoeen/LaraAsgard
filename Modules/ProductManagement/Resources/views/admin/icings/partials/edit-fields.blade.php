<div class="box-body">

    {!! Form::normalInput('name', 'Design Name',$errors,$icing) !!}

    <div class="form-group">
        <label>Price $</label>
        <div class="input-group ">
            <div class="input-group-addon">
                <i class="fa fa-money"></i>
            </div>
            <input class="form-control form-control-lg" type="number" name="price" value="{{$icing->price}}" placeholder="Price" min="0">
        </div>
    </div>

    <div class="form-group"{{ $errors->has("status") ? ' has-error' : '' }} >
        <!-- Status input -->
        <label>Icing Status</label><br/>
        <?php $old = $icing->status ? $icing->status : 0 ?>
        <input id="status" name="status" type="radio" class="flat-blue" value="1" {{ (old("status",$old) && $old == 0) ?: 'checked' }}/>
        {{trans('productmanagement::subcategories.attributes.statuses.1')}}
        <input id="status" name="status" type="radio" class="flat-blue" value="0" {{ (old("status",$old) && $old == 1) ?: 'checked' }}/>
        {{trans('productmanagement::subcategories.attributes.statuses.0')}}
        {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
    </div>

</div>


