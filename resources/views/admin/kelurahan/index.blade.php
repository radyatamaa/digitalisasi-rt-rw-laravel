@extends('layouts.admin')
@section('content')
@can('kelurahan_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.kelurahan.create") }}">
            {{ trans('global.add') }} {{ trans('global.kelurahan.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.kelurahan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.kelurahan.fields.kel_name') }}
                        </th>
                        <th>
                            {{ trans('global.kelurahan.fields.kel_code') }}
                        </th>
                        <th>
                            {{ trans('global.kelurahan.fields.kel_kec_id') }}
                        </th>
                        <th>
                            {{ trans('global.kelurahan.fields.kel_status') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kelurahan as $key => $kelurahans)
                    <tr data-entry-id="{{ $kelurahans->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $kelurahans->kel_name ?? '' }}
                        </td>
                        <td>
                            {{ $kelurahans->kel_code ?? '' }}
                        </td>
                        <td>
                            {{ $kelurahans->kel_kec_id ?? '' }}
                        </td>
                        <td>
                            {{ $kelurahans->kel_status ?? '' }}
                        </td>

                        <td>
                            @can('kelurahan_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.kelurahan.show', $kelurahans->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @can('kelurahan_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.kelurahan.edit', $kelurahans->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('kelurahan_delete')
                            <form action="{{ route('admin.kelurahan.destroy', $kelurahans->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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