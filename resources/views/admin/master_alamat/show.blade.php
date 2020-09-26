@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.master_alamat.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.master_alamat.fields.address_code_name') }}
                    </th>
                    <th>
                        {{ trans('global.master_alamat.fields.address_code_rt') }}
                    </th>
                    <td>
                        {{ $master_alamat->address_code_name }}
                    </td>
                    <td>
                        {{ $master_alamat->address_code_rt }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection