@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.master_agama.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.master_agama.fields.religion_name') }}
                    </th>
                    <td>
                        {{ $master_agama->religion_name }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection