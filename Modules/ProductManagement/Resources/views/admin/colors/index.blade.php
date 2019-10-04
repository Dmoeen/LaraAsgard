@extends('layouts.master')

@section('content-header')
        <h1>
                {{ trans('productmanagement::colors.title.colors') }}
        </h1>
        <ol class="breadcrumb">
                <li><a href="{{ route('dashboard.index') }}"><i
                                        class="fa fa-dashboard"></i> {{ trans('core::core.breadcrumb.home') }}</a></li>
                <li class="active">{{ trans('productmanagement::colors.title.colors') }}</li>
        </ol>
@stop

@section('content')
        <div class="row">
                <div class="col-xs-12">
                        <div class="row">
                                <div class="btn-group pull-right" style="margin: 0 15px 15px 0;">
                                        <a href="{{ route('admin.productmanagement.color.create') }}"
                                           class="btn btn-primary btn-flat" style="padding: 4px 10px;">
                                                <i class="fa fa-pencil"></i> {{ trans('productmanagement::colors.button.create color') }}
                                        </a>
                                </div>
                        </div>
                        <div class="box box-primary">
                                <div class="box-header">
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                        <div class="table-responsive">
                                                <table class="data-table table table-bordered table-hover">
                                                        <thead>
                                                        <tr>
                                                                <th>Name</th>
                                                                <th>Photo</th>
                                                                <th>Price</th>
                                                                <th>Type</th>
                                                                <th>{{ trans('core::core.table.created at') }}</th>
                                                                <th data-sortable="false">{{ trans('core::core.table.actions') }}</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if (isset($colors)): ?>
                                                        <?php foreach ($colors as $color): ?>
                                                        <tr>
                                                                <td>
                                                                        <a href="{{ route('admin.productmanagement.color.edit', [$color->id]) }}">
                                                                                {{ $color->name }}
                                                                        </a>
                                                                </td>
                                                                <td>
                                                                        <img class="img-thumbnail"
                                                                             src="{{URL::to('/').'/images/'.$color->phone}}"
                                                                             alt="Smiley face" height="62" width="62">
                                                                </td>

                                                                <td>
                                                                        <a href="{{ route('admin.productmanagement.color.edit', [$color->id]) }}">
                                                                                {{ $color->price }}
                                                                        </a>
                                                                </td>
                                                                <td>
                                                                        <a href="{{ route('admin.productmanagement.color.edit', [$color->id]) }}">
                                                                                {{ $color->type }}
                                                                        </a>
                                                                </td>
                                                                <td>
                                                                        <a href="{{ route('admin.productmanagement.color.edit', [$color->id]) }}">
                                                                                {{ $color->created_at }}
                                                                        </a>
                                                                </td>
                                                                <td>
                                                                        <div class="btn-group">
                                                                                <a href="{{ route('admin.productmanagement.color.edit', [$color->id]) }}"
                                                                                   class="btn btn-default btn-flat"><i
                                                                                                class="fa fa-pencil"></i></a>
                                                                                <button class="btn btn-danger btn-flat"
                                                                                        data-toggle="modal"
                                                                                        data-target="#modal-delete-confirmation"
                                                                                        data-action-target="{{ route('admin.productmanagement.color.destroy', [$color->id]) }}">
                                                                                        <i class="fa fa-trash"></i>
                                                                                </button>
                                                                        </div>
                                                                </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                        <?php endif; ?>
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                                <th>Name</th>
                                                                <th>Photo</th>
                                                                <th>Price</th>
                                                                <th>Type</th>
                                                                <th>{{ trans('core::core.table.created at') }}</th>
                                                                <th>{{ trans('core::core.table.actions') }}</th>
                                                        </tr>
                                                        </tfoot>
                                                </table>
                                                <!-- /.box-body -->
                                        </div>
                                </div>
                                <!-- /.box -->
                        </div>
                </div>
        </div>
        @include('core::partials.delete-modal')
@stop

@section('footer')
        <a data-toggle="modal" data-target="#keyboardShortcutsModal"><i class="fa fa-keyboard-o"></i></a> &nbsp;
@stop
@section('shortcuts')
        <dl class="dl-horizontal">
                <dt><code>c</code></dt>
                <dd>{{ trans('productmanagement::colors.title.create color') }}</dd>
        </dl>
@stop

@push('js-stack')
        <script type="text/javascript">
            $(document).ready(function () {
                $(document).keypressAction({
                    actions: [
                        {key: 'c', route: "<?= route('admin.productmanagement.color.create') ?>"}
                    ]
                });
            });
        </script>
        <?php $locale = locale(); ?>
        <script type="text/javascript">
            $(function () {
                $('.data-table').dataTable({
                    "paginate": true,
                    "lengthChange": true,
                    "filter": true,
                    "sort": true,
                    "info": true,
                    "autoWidth": true,
                    "order": [[0, "desc"]],
                    "language": {
                        "url": '<?php echo Module::asset("core:js/vendor/datatables/{$locale}.json") ?>'
                    }
                });
            });
        </script>
@endpush
