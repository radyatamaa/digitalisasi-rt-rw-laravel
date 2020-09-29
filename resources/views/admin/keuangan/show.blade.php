@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.keuangan.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.keuangan.fields.keuangan_tipe') }}
                    </th>
                    <td>
                        {{ $keuangan->keuangan_tipe }}
                    </td>
                   
                </tr>

                <tr>
                <th>
                        {{ trans('global.keuangan.fields.keuangan_category') }}
                    </th>
                    <td>
                        {{ $keuangan->keuangan_category }}
                    </td>
                    </tr>
                    <tr>
                <th>
                        {{ trans('global.keuangan.fields.keuangan_periode') }}
                    </th>
                    <td>
                        {{ $keuangan->keuangan_periode }}
                    </td>
                    </tr>
                    <tr>
                <th>
                        {{ trans('global.keuangan.fields.keuangan_value') }}
                    </th>
                    <td>
                        {{ $keuangan->keuangan_value }}
                    </td>
                    </tr>
                    <tr>
                <th>
                        {{ trans('global.keuangan.fields.keuangan_warga_id') }}
                    </th>
                    <td>
                        {{ $keuangan->keuangan_warga_id }}
                    </td>
                    </tr>
                <tr>
                    <th>
                        {{ trans('global.keuangan.fields.keuangan_rt') }}
                    </th>
                    <td>
                        {{ $keuangan->keuangan_rt }}
                    </td>
                   
                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection