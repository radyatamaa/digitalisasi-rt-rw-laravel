@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('global.insidental_category.title') }}
    </div>

    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>
                        {{ trans('global.insidental_category.fields.category_name') }}
                    </th>
                    <td>
                        {{ $insidental_category->category_name }}
                    </td>
                </tr>
              
            </tbody>
        </table>
    </div>
</div>

@endsection