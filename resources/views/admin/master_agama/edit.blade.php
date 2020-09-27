@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.master_agama.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.master_agama.update", [$master_agama->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('religion_name') ? 'has-error' : '' }}">
                <label for="religion_name">{{ trans('global.master_agama.fields.religion_name') }}*</label>
                <input type="text" id="religion_name" name="religion_name" class="form-control" value="{{ old('religion_name', isset($master_agama) ? $master_agama->religion_name : '') }}">
                @if($errors->has('religion_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('religion_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_agama.fields.religion_name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection