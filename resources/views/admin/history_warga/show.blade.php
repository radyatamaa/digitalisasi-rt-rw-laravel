@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.history_warga.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.history_warga.fields.history_desc') }}
                    </th>
                    <th>
                        {{ trans('global.history_warga.fields.history_date') }}
                    </th>
                    <th>
                        {{ trans('global.history_warga.fields.history_category') }}
                    </th>
                    <td>
                        {{ $history_warga->history_desc }}
                    </td>
                    <td>
                        {{ $history_warga->history_date }}
                    </td>
                    <td>
                        {{ $history_warga->history_category }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection