@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.rw.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.rw.fields.rw_name') }}
                    </th>
                    <td>
                        {{ $rw->rw_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rw.fields.rw_code') }}
                    </th>
                    <td>
                        {{ $rw->rw_code }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rw.fields.rw_kel_id') }}
                    </th>
                    <td>
                        {{ $rw->rw_kel_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rw.fields.rw_status') }}
                    </th>
                    <td>
                        {{ $rw->rw_status }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection