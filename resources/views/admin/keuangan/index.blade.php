@extends('layouts.admin')
@section('content')
@can('keuangan_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.keuangan.create") }}">
                {{ trans('global.add') }} {{ trans('global.keuangan.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('global.keuangan.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('global.keuangan.fields.keuangan_tipe') }}
                        </th>
                        <th>
                            {{ trans('global.keuangan.fields.keuangan_category') }}
                        </th>
                        <th>
                            {{ trans('global.keuangan.fields.keuangan_periode') }}
                        </th>
                        <th>
                            {{ trans('global.keuangan.fields.keuangan_value') }}
                        </th>
                        <th>
                            {{ trans('global.keuangan.fields.keuangan_warga_id') }}
                        </th>
                        <th>
                            {{ trans('global.keuangan.fields.keuangan_rt') }}
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($keuangan as $key => $keuangans)
                        <tr data-entry-id="{{ $keuangans->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $keuangans->keuangan_tipe ?? '' }}
                            </td>
                            <td>
                                {{ $keuangans->category_name ?? '' }}
                            </td>
                            <td>
                                {{ $keuangans->keuangan_periode ?? '' }}
                            </td>
                            <td>
                                {{ $keuangans->keuangan_value ?? '' }}
                            </td>
                            <td>
                                {{ $keuangans->warga_first_name . ' ' . $keuangans->warga_last_name ?? '' }}
                            </td>
                            <td>
                                {{ $keuangans->rt_name ?? '' }}
                            </td>
                            
                            <td>
                                @can('keuangan_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.keuangan.show', $keuangans->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('keuangan_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.keuangan.edit', $keuangans->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan
                                @can('keuangan_delete')
                                    <form action="{{ route('admin.keuangan.destroy', $keuangans->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
    $(function () {
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.products.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('product_delete')
  dtButtons.push(deleteButton)
@endcan

  $('.datatable:not(.ajaxTable)').DataTable({ buttons: dtButtons })
})

</script>
@endsection
@endsection