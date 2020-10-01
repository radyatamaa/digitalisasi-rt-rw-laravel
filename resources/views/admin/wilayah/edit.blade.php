@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.wilayah.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.wilayah.update", [$wilayah->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('wilayah_name') ? 'has-error' : '' }}">
                <label for="wilayah_name">{{ trans('global.wilayah.fields.wilayah_name') }}*</label>
                <input type="text" id="wilayah_name" name="wilayah_name" class="form-control" value="{{ old('wilayah_name', isset($wilayah) ? $wilayah->wilayah_name : '') }}">
                @if($errors->has('wilayah_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('wilayah_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.wilayah.fields.wilayah_name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection