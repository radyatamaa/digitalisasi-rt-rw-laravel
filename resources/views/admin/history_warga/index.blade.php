@extends('layouts.admin')
@section('content')
@can('history_warga_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.history_warga.create") }}">
            {{ trans('global.add') }} {{ trans('global.history_warga.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.history_warga.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.history_warga.fields.history_desc') }}
                        </th>
                        <th>
                            {{ trans('global.history_warga.fields.history_date') }}
                        </th>
                        <th>
                            {{ trans('global.history_warga.fields.history_category') }}
                        </th>
                        <th>
                            {{ trans('global.history_warga.fields.warga_id') }}
                        </th>
                        <!-- <th>
                            {{ trans('global.product.fields.description') }}
                        </th>
                        <th>
                            {{ trans('global.product.fields.price') }}
                        </th> -->
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history_warga as $key => $history_wargas)
                    <tr data-entry-id="{{ $history_wargas->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $history_wargas->history_desc ?? '' }}
                        </td>
                        <td>
                            {{ $history_wargas->history_date ?? '' }}
                        </td>
                        <td>
                            {{ $history_wargas->history_category ?? '' }}
                        </td>
                        <td>
                            {{ $history_wargas->warga_id ?? '' }}
                        </td>
                        <!-- <td>
                                {{ $product->description ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td> -->
                        <td>
                            @can('history_warga_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.history_warga.show', $history_wargas->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @can('history_warga_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.history_warga.edit', $history_wargas->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('history_warga_delete')
                            <form action="{{ route('admin.history_warga.destroy', $history_wargas->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                            @endcan
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
@parent
<script>
    $(function() {
        let deleteButtonTrans = '{{ trans('
        global.datatables.delete ') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.products.massDestroy') }}",
            className: 'btn-danger',
            action: function(e, dt, node, config) {
                var ids = $.map(dt.rows({
                    selected: true
                }).nodes(), function(entry) {
                    return $(entry).data('entry-id')
                });

                if (ids.length === 0) {
                    alert('{{ trans('
                        global.datatables.zero_selected ') }}')

                    return
                }

                if (confirm('{{ trans('
                        global.areYouSure ') }}')) {
                    $.ajax({
                            headers: {
                                'x-csrf-token': _token
                            },
                            method: 'POST',
                            url: config.url,
                            data: {
                                ids: ids,
                                _method: 'DELETE'
                            }
                        })
                        .done(function() {
                            location.reload()
                        })
                }
            }
        }
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('product_delete')
        dtButtons.push(deleteButton)
        @endcan

        $('.datatable:not(.ajaxTable)').DataTable({
            buttons: dtButtons
        })
    })
</script>
@endsection
@endsection