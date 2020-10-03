@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.sekolah.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.sekolah.fields.sekolah_pendidikan') }}
                    </th>
                    <td>
                        {{ $sekolah->sekolah_pendidikan }}
                    </td>

                </tr>

                <tr>
                    <th>
                        {{ trans('global.sekolah.fields.sekolah_name') }}
                    </th>
                    <td>
                        {{ $sekolah->sekolah_name }}
                    </td>
                </tr>
                <tr>
                    <th>
                        {{ trans('global.sekolah.fields.sekolah_wilayah') }}
                    </th>
                    <td>
                        {{ $sekolah->sekolah_wilayah }}
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection