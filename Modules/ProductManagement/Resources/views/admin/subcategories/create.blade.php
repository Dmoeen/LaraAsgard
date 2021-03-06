@extends('layouts.master')

@section('content-header')
    <h1>
        {{ trans('productmanagement::subcategories.title.create subcategory') }}
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard.index') }}"><i class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
        <li><a href="{{ route('admin.productmanagement.subcategory.index') }}">{{ trans('productmanagement::subcategories.title.subcategories') }}</a></li>
        <li class="active">{{ trans('productmanagement::subcategories.title.create subcategory') }}</li>
    </ol>
@stop

@section('content')
    {!! Form::open(['route' => ['admin.productmanagement.subcategory.store'], 'method' => 'post','enctype'=>"multipart/form-data"]) !!}
    <div class="row">
        <div class="col-md-6">
            <div class="nav-tabs-custom">
                @include('partials.form-tab-headers')
                <div class="tab-content">
                    <?php $i = 0; ?>
                    @foreach (LaravelLocalization::getSupportedLocales() as $locale => $language)
                        <?php $i++; ?>
                        <div class="tab-pane {{ locale() == $locale ? 'active' : '' }}" id="tab_{{ $i }}">
                            @include('productmanagement::admin.subcategories.partials.create-fields', ['lang' => $locale])
                        </div>
                    @endforeach

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-flat">{{ trans('core::core.button.create') }}</button>
                        <a class="btn btn-danger pull-right btn-flat" href="{{ route('admin.productmanagement.subcategory.index')}}"><i class="fa fa-times"></i> {{ trans('core::core.button.cancel') }}</a>
                    </div>
                </div>
            </div> {{-- end nav-tabs-custom --}}
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
            <div class="form-group"{{ $errors->has("category_id") ? ' has-error' : '' }} >
                <!-- institute input -->
                <label>{{ trans('productmanagement::productmanagements.form.select-category') }}</label>
                {!! Form::select('category_id', $categorys,old('category_id'),['class'=>'form-control select2','id'=>'category-id','data-placeholder' => trans("productmanagement::productmanagements.form.select-category"),'required' => 'required']) !!}
                {!! $errors->first("category_id", '<span style="color:red" class="help-block">:message</span>') !!}
            </div>
                </div>
            </div>

        </div>
    </div>
    {!! Form::close() !!}
@stop

@section('footer')
    <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
    <dl class="dl-horizontal">
        <dt><code>b</code></dt>
        <dd>{{ trans('core::core.back to index') }}</dd>
    </dl>
@stop

@push('js-stack')
    <script type="text/javascript">
        $( document ).ready(function() {
            $(document).keypressAction({
                actions: [
                    { key: 'b', route: "<?= route('admin.productmanagement.subcategory.index') ?>" }
                ]
            });
        });
    </script>
    <script>
        $( document ).ready(function() {
            $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
                checkboxClass: 'icheckbox_flat-blue',
                radioClass: 'iradio_flat-blue'
            });
            $('.select2').select2();


        });
    </script>
@endpush
