@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.master_gaji.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.master_gaji.fields.salary_start') }}
                    </th>
                    <th>
                        {{ trans('global.master_gaji.fields.salary_end') }}
                    </th>
                    <td>
                        {{ $master_gaji->salary_start }}
                    </td>
                    <td>
                        {{ $master_gaji->salary_end }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection