@extends('layouts.admin')
@section('content')
@can('rt_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.rt.create") }}">
            {{ trans('global.add') }} {{ trans('global.rt.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.rt.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.rt.fields.rt_name') }}
                        </th>
                        <th>
                            {{ trans('global.rt.fields.rt_code') }}
                        </th>
                        <th>
                            {{ trans('global.rt.fields.rt_rw_id') }}
                        </th>
                        <th>
                            {{ trans('global.rt.fields.rt_status') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rt as $key => $rts)
                    <tr data-entry-id="{{ $rts->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $rts->rt_name ?? '' }}
                        </td>
                        <td>
                            {{ $rts->rt_code ?? '' }}
                        </td>
                        <td>
                            {{ $rts->rt_rw_id ?? '' }}
                        </td>
                        <td>
                            {{ $rts->irt_status ?? '' }}
                        </td>

                        <td>
                            @can('rt_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.rt.show', $rts->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @can('rt_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.rt.edit', $rts->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('rt_delete')
                            <form action="{{ route('admin.rt.destroy', $rts->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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