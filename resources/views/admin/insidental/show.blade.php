@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.insidental.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.insidental.fields.ins_name') }}
                    </th>
                    <td>
                        {{ $insidental->ins_name }}
                    </td>
                   
                </tr>
                <tr>
                <th>
                        {{ trans('global.insidental.fields.ins_category') }}
                    </th>
                    <td>
                        {{ $insidental->ins_category }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        {{ trans('global.insidental.fields.ins_detail') }}
                    </th>
                    <td>
                        {{ $insidental->ins_detail }}
                    </td>
                    </tr>
                    <tr>
                    <th>
                        {{ trans('global.insidental.fields.ins_date') }}
                    </th>
                    <td>
                        {{ $insidental->ins_date }}
                    </td>
                    </tr>
              
            </tbody>
        </table>
    </div>
</div>

@endsection