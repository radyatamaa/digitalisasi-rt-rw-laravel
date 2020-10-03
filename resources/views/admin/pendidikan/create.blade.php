@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.pendidikan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.pendidikan.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
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
            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.pendidikan.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($pendidikan) ? $pendidikan->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.pendidikan.fields.description_helper') }}
                </p>
            </div> -->
            <!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.pendidikan.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($pendidikan) ? $pendidikan->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.pendidikan.fields.price_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection