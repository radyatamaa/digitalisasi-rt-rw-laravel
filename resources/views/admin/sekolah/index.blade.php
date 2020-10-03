@extends('layouts.admin')
@section('content')
@can('sekolah_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.sekolah.create") }}">
            {{ trans('global.add') }} {{ trans('global.sekolah.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.sekolah.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.sekolah.fields.sekolah_pendidikan') }}
                        </th>
                        <th>
                            {{ trans('global.sekolah.fields.sekolah_name') }}
                        </th>
                        <th>
                            {{ trans('global.sekolah.fields.sekolah_wilayah') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sekolah as $key => $sekolahs)
                    <tr data-entry-id="{{ $sekolahs->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $sekolahs->sekolah_pendidikan ?? '' }}
                        </td>
                        <td>
                            {{ $sekolahs->sekolah_name ?? '' }}
                        </td>
                        <td>
                            {{ $sekolahs->sekolah_wilayah ?? '' }}
                        </td>
                        <td>
                            @can('sekolah_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.sekolah.show', $sekolahs->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @can('sekolah_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.sekolah.edit', $sekolahs->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('sekolah_delete')
                            <form action="{{ route('admin.sekolah.destroy', $sekolahs->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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