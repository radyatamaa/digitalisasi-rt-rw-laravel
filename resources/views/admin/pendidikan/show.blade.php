@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.pendidikan.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.pendidikan.fields.pendidikan_name') }}
                    </th>
                    <td>
                        {{ $pendidikan->pendidikan_name }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection