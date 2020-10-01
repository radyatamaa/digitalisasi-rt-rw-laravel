@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.wilayah.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.wilayah.fields.wilayah_name') }}
                    </th>
                    <td>
                        {{ $wilayah->wilayah_name }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection