@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.kelurahan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.kelurahan.update", [$kelurahan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('kel_name') ? 'has-error' : '' }}">
                <label for="kel_name">{{ trans('global.kelurahan.fields.kel_name') }}*</label>
                <input type="text" id="kel_name" name="kel_name" class="form-control" value="{{ old('kel_name', isset($kelurahan) ? $kelurahan->kel_name : '') }}">
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
                <input type="text" id="kel_code" name="kel_code" class="form-control" value="{{ old('kel_code', isset($kelurahan) ? $kelurahan->kel_code : '') }}">
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
                <input type="text" id="kel_kec_id" name="kel_kec_id" class="form-control" value="{{ old('kel_kec_id', isset($kelurahan) ? $kelurahan->kel_kec_id : '') }}">
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
                <input type="text" id="kel_status" name="kel_status" class="form-control" value="{{ old('kel_status', isset($kelurahan) ? $kelurahan->kel_status : '') }}">
                @if($errors->has('kel_status'))
                <em class="invalid-feedback">
                    {{ $errors->first('kel_status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.kelurahan.fields.kel_status_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection