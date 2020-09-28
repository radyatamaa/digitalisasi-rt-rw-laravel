@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.rt.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.rt.fields.rt_name') }}
                    </th>
                    <td>
                        {{ $rt->rt_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rt.fields.rt_code') }}
                    </th>
                    <td>
                        {{ $rt->rt_code }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rt.fields.rt_rw_id') }}
                    </th>
                    <td>
                        {{ $rt->rt_rw_id }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.rt.fields.rt_status') }}
                    </th>
                    <td>
                        {{ $rt->rt_status }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection