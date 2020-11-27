@extends('layouts.admin')
@section('content')
<!-- @can('sdm_category_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.sdm_category.create") }}">
                {{ trans('global.add') }} {{ trans('global.sdm_category.title_singular') }}
            </a>
        </div>
    </div>
@endcan -->

<div class="card">
    <div class="card-header">
        Report Data Masyarakan Kurang Mampu
        <!-- {{ trans('global.report_data_masyarakat_km.title_singular') }} {{ trans('global.list') }} -->
    </div>

    <div class="card-body">
        <div class="table-responsive">

            <table class=" table table-bordered table-striped table-hover datatable">

                <thead>

                    <tr>

                        <!-- <th width="10">

                        </th> -->
                        <th>

                            <!-- {{ trans('global.report_data_masyarakat_km.fields.category_name') }} -->
                        </th>
                        <th>
                            No
                            <!-- {{ trans('global.report_data_masyarakat_km.fields.category_name') }} -->
                        </th>
                        <th>
                            <!-- {{ trans('global.product.fields.description') }} -->
                            Nama Warga
                        </th>
                        <th>
                            Alamat Warga
                            <!-- {{ trans('global.product.fields.price') }} -->
                        </th>
                        <th>
                            Pendapatan
                            <!-- {{ trans('global.product.fields.price') }} -->
                        </th>

                        <!-- <th>
                            &nbsp;
                        </th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($viewWargaSalary as $key => $hargasalary)
                    <tr>
                        <td>

                        </td>
                        <td>
                            {{ $key + 1 ?? '' }}
                        </td>
                        <td>
                            {{ $hargasalary->nama_warga ?? '' }}
                        </td>
                        <td>
                            {{ $hargasalary->warga_address ?? '' }}
                        </td>
                        <td>
                            {{ $hargasalary->salary_range ?? '' }}
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