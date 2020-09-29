@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.rw.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.rw.store") }}" method="POST" enctype="multiparw/form-data">
            @csrf
            <div class="form-group {{ $errors->has('rw_name') ? 'has-error' : '' }}">
                <label for="rw_name">{{ trans('global.rw.fields.rw_name') }}*</label>
                <input type="text" id="rw_name" name="rw_name" class="form-control" value="{{ old('rw_name', isset($rw) ? $rw->rw_name : '') }}">
                @if($errors->has('rw_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('rw_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rw.fields.rw_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rw_code') ? 'has-error' : '' }}">
                <label for="rw_code">{{ trans('global.rw.fields.rw_code') }}*</label>
                <input type="text" id="rw_code" name="rw_code" class="form-control" value="{{ old('rw_code', isset($rw) ? $rw->rw_code : '') }}">
                @if($errors->has('rw_code'))
                <em class="invalid-feedback">
                    {{ $errors->first('rw_code') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rw.fields.rw_code_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rw_kel_id') ? 'has-error' : '' }}">
                <label for="rw_kel_id">{{ trans('global.rw.fields.rw_kel_id') }}*</label>
                <input type="text" id="rw_kel_id" name="rw_kel_id" class="form-control" value="{{ old('rw_kel_id', isset($rw) ? $rw->rw_kel_id : '') }}">
                @if($errors->has('rw_kel_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('rw_kel_id') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rw.fields.rw_kel_id_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('rw_status') ? 'has-error' : '' }}">
                <label for="rw_status">{{ trans('global.rw.fields.rw_status') }}*</label>
                <input type="text" id="rw_status" name="rw_status" class="form-control" value="{{ old('rw_status', isset($rw) ? $rw->rw_status : '') }}">
                @if($errors->has('rw_status'))
                <em class="invalid-feedback">
                    {{ $errors->first('rw_status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rw.fields.rw_status_helper') }}
                </p>
            </div>

            <!-- <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                <label for="ins_category">{{ trans('global.rw.fields.ins_category') }}*</label>
                <input type="text" id="ins_category" name="ins_category" class="form-control" value="{{ old('ins_category', isset($rw) ? $rw->ins_category : '') }}">
                @if($errors->has('ins_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.rw.fields.ins_category_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection