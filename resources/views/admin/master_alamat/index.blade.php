@extends('layouts.admin')
@section('content')
@can('master_alamat_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-success" href="{{ route("admin.master_alamat.create") }}">
            {{ trans('global.add') }} {{ trans('global.master_alamat.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.master_alamat.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.master_alamat.fields.address_code_name') }}
                        </th>
                        <th>
                            {{ trans('global.master_alamat.fields.address_rt_name') }}
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
                    @foreach($master_alamat as $key => $master_alamats)
                    <tr data-entry-id="{{ $master_alamats->id }}">
                        <td>

                        </td>
                        <td>
                            {{ $master_alamats->address_code_name ?? '' }}
                        </td>
                        <td>
                            {{ $master_alamats->address_code_rt ?? '' }}
                        </td>
                        <!-- <td>
                                {{ $product->description ?? '' }}
                            </td>
                            <td>
                                {{ $product->price ?? '' }}
                            </td> -->
                        <td>
                            @can('master_alamat_show')
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.master_alamat.show', $master_alamats->id) }}">
                                {{ trans('global.view') }}
                            </a>
                            @endcan
                            @can('master_alamat_edit')
                            <a class="btn btn-xs btn-info" href="{{ route('admin.master_alamat.edit', $master_alamats->id) }}">
                                {{ trans('global.edit') }}
                            </a>
                            @endcan
                            @can('master_alamat_delete')
                            <form action="{{ route('admin.master_alamat.destroy', $master_alamats->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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