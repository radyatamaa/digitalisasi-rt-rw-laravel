@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.kelurahan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.kelurahan.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('kel_name') ? 'has-error' : '' }}">
                <label for="kel_name">{{ trans('global.kelurahan.fields.kel_name') }}*</label>
                <input type="text" id="kel_name" name="kel_name" class="form-control" value="{{ old('kel_name', isset($kel) ? $kel->kel_name : '') }}">
                @if($errors->has('kel_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('kel_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.kelurahan.fields.kel_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('kel_code') ? 'has-error' : '' }}">
                <label for="kel_code">{{ trans('global.kelurahan.fields.kel_code') }}*</label>
                <input type="text" id="kel_code" name="kel_code" class="form-control" value="{{ old('kel_code', isset($kel) ? $kel->kel_code : '') }}">
                @if($errors->has('kel_code'))
                <em class="invalid-feedback">
                    {{ $errors->first('kel_code') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.kelurahan.fields.kel_code_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('kel_kec_id') ? 'has-error' : '' }}">
                <label for="kel_kec_id">{{ trans('global.kelurahan.fields.kel_kec_id') }}*</label>
                <input type="text" id="kel_kec_id" name="kel_kec_id" class="form-control" value="{{ old('kel_kec_id', isset($kel) ? $kel->kel_kec_id : '') }}">
                @if($errors->has('kel_kec_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('kel_kec_id') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.kelurahan.fields.kel_kec_id_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('kel_status') ? 'has-error' : '' }}">
                <label for="kel_status">{{ trans('global.kelurahan.fields.kel_status') }}*</label>
                <input type="text" id="kel_status" name="kel_status" class="form-control" value="{{ old('kel_status', isset($kel) ? $kel->kel_status : '') }}">
                @if($errors->has('kel_status'))
                <em class="invalid-feedback">
                    {{ $errors->first('kel_status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.kelurahan.fields.kel_status_helper') }}
                </p>
            </div>

            <!-- <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                <label for="ins_category">{{ trans('global.kelurahan.fields.ins_category') }}*</label>
                <input type="text" id="ins_category" name="ins_category" class="form-control" value="{{ old('ins_category', isset($kel) ? $kel->ins_category : '') }}">
                @if($errors->has('ins_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.kelurahan.fields.ins_category_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection