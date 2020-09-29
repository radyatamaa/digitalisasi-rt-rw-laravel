@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.event.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.event.fields.event_name') }}
                    </th>
                    <td>
                        {{ $event->event_name }}
                    </td>
                   
                </tr>
                <tr>
                    <th>
                        {{ trans('global.event.fields.event_rt') }}
                    </th>
                    <td>
                        {{ $event->event_rt }}
                    </td>
                   
                </tr>

                <tr>
                <th>
                        {{ trans('global.event.fields.event_category') }}
                    </th>
                    <td>
                        {{ $event->event_category }}
                    </td>
                    </tr>
                   
                    <tr>
                    <th>
                        {{ trans('global.event.fields.event_date') }}
                    </th>
                    <td>
                        {{ $event->event_date }}
                    </td>
                    </tr>
              
            </tbody>
        </table>
    </div>
</div>

@endsection