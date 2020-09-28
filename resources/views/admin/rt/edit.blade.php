@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.rt.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rt.update", [$rt->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('rt_name') ? 'has-error' : '' }}">
                <label for="rt_name">{{ trans('global.rt.fields.rt_name') }}*</label>
                <input type="text" id="rt_name" name="rt_name" class="form-control" value="{{ old('rt_name', isset($rt) ? $rt->rt_name : '') }}">
                @if($errors->has('rt_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('rt_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rt.fields.rt_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rt_code') ? 'has-error' : '' }}">
                <label for="rt_code">{{ trans('global.rt.fields.rt_code') }}*</label>
                <input type="text" id="rt_code" name="rt_code" class="form-control" value="{{ old('rt_code', isset($rt) ? $rt->rt_code : '') }}">
                @if($errors->has('rt_code'))
                <em class="invalid-feedback">
                    {{ $errors->first('rt_code') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rt.fields.rt_code_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rt_rw_id') ? 'has-error' : '' }}">
                <label for="rt_rw_id">{{ trans('global.rt.fields.rt_rw_id') }}*</label>
                <input type="text" id="rt_rw_id" name="rt_rw_id" class="form-control" value="{{ old('rt_rw_id', isset($rt) ? $rt->rt_rw_id : '') }}">
                @if($errors->has('rt_rw_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('rt_rw_id') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rt.fields.rt_rw_id_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rt_status') ? 'has-error' : '' }}">
                <label for="rt_status">{{ trans('global.rt.fields.rt_status') }}*</label>
                <input type="text" id="rt_status" name="rt_status" class="form-control" value="{{ old('rt_status', isset($rt) ? $rt->rt_status : '') }}">
                @if($errors->has('rt_status'))
                <em class="invalid-feedback">
                    {{ $errors->first('rt_status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rt.fields.rt_status_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection