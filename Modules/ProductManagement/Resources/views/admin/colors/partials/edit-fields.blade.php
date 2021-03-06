<div class="box-body">

        {!! Form::normalInput('name', 'Color Name',$errors,$color) !!}

        <div class="form-group">
                <label>Price $</label>
                <div class="input-group ">
                        <div class="input-group-addon">
                                <i class="fa fa-money"></i>
                        </div>
                        <input class="form-control form-control-lg" type="number" name="price" value="{{$color->price}}"
                               placeholder="Price"
                               min="0">
                </div>
        </div>

        <div class="form-group"{{ $errors->has("status") ? ' has-error' : '' }} >
                <!-- Status input -->
                <label>Color Status</label><br/>
            <?php $old = $color->status ? $color->status : 0 ?>
                {{--<input id="status" name="status" type="checkbox" class="flat-blue" {{ (is_null(old("status",$old))) ?: 'checked' }} value="1"/>--}}
                <input id="status" name="status" type="radio" class="flat-blue"
                       value="1" {{ (old("status",$old) && $old == 0) ?: 'checked' }}/>
                {{trans('productmanagement::subcategories.attributes.statuses.1')}}
                <input id="status" name="status" type="radio" class="flat-blue"
                       value="0" {{ (old("status",$old) && $old == 1) ?: 'checked' }}/>
                {{trans('productmanagement::subcategories.attributes.statuses.0')}}
                {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
        </div>

        <div class="form-group">
                <label>Expiry Date:</label>
                <div class="input-group date">
                        <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" name="expiry_date" value="{{$color->expiry_date}}"
                               class="form-control pull-right datepicker">
                </div>
                <!-- /.input group -->
        </div>


        <div class="form-group  d-flex flex-column py-3">
                <label for="image"> Color Image</label>
                <input type="file" name="image" class="py-3"/>
                <div>{{$errors->first('image')}}</div>
        </div>
        <div>
                <td><img class="img-thumbnail" src="{{'http://localhost/images/'.$color->image_name}}" alt="Smiley face"
                         height="150" width="150"></td>
        </div>
        <div class="form-group"{{ $errors->has("status") ? ' has-error' : '' }} >
                <!-- Status input -->
                <label>Color Type</label><br/>
            <?php $old = $color->type ? $color->type : 'BORDER' ?>
                <input id="type" name="type" type="radio" class="flat-blue"
                       value="BASE" {{ (old("status",$old) && $old == 0) ?: 'checked' }}/>Base
                <input id="type" name="type" type="radio" class="flat-blue"
                       value="BORDER" {{ (old("status",$old) && $old == 1) ?: 'checked' }}/>
                Border {!! $errors->first("status", '<span style="color:red" class="help-block">:message</span>') !!}
        </div>
</div>


