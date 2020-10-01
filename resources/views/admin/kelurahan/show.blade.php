@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.kelurahan.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.kelurahan.fields.kel_name') }}
                    </th>
                    <td>
                        {{ $kelurahan->kel_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.kelurahan.fields.kel_code') }}
                    </th>
                    <td>
                        {{ $kelurahan->kel_code }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.kelurahan.fields.kel_kec_id') }}
                    </th>
                    <td>
                        {{ $kelurahan->kel_kec_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.kelurahan.fields.kel_status') }}
                    </th>
                    <td>
                        {{ $kelurahan->kel_status }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection