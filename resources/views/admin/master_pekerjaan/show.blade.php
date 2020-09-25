@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.master_pekerjaan.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.master_pekerjaan.fields.job_name') }}
                    </th>
                    <td>
                        {{ $master_pekerjaan->job_name }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection