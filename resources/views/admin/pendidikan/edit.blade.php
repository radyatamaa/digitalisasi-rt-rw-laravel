@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.pendidikan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pendidikan.update", [$pendidikan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('pendidikan_name') ? 'has-error' : '' }}">
                <label for="pendidikan_name">{{ trans('global.pendidikan.fields.pendidikan_name') }}*</label>
                <input type="text" id="pendidikan_name" name="pendidikan_name" class="form-control" value="{{ old('pendidikan_name', isset($pendidikan) ? $pendidikan->pendidikan_name : '') }}">
                @if($errors->has('pendidikan_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('pendidikan_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.pendidikan.fields.pendidikan_name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection