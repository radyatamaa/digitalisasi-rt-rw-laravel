@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.wilayah.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.wilayah.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.wilayah.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($wilayah) ? $wilayah->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.wilayah.fields.description_helper') }}
                </p>
            </div> -->
            <!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.wilayah.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($wilayah) ? $wilayah->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.wilayah.fields.price_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection