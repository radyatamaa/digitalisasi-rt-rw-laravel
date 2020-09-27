@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.master_agama.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.master_agama.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.master_agama.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($master_agama) ? $master_agama->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_agama.fields.description_helper') }}
                </p>
            </div> -->
            <!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.master_agama.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($master_agama) ? $master_agama->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_agama.fields.price_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection