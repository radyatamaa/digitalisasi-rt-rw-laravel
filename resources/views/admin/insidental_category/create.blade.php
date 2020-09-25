@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.insidental_category.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.insidental_category.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('category_name') ? 'has-error' : '' }}">
                <label for="category_name">{{ trans('global.insidental_category.fields.category_name') }}*</label>
                <input type="text" id="category_name" name="category_name" class="form-control" value="{{ old('category_name', isset($insidental_category) ? $insidental_category->category_name : '') }}">
                @if($errors->has('category_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.event_category.fields.category_name_helper') }}
                </p>
            </div>
            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.sdm_category.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($sdm_category) ? $sdm_category->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.sdm_category.fields.description_helper') }}
                </p>
            </div> -->
            <!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.sdm_category.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($sdm_category) ? $sdm_category->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.sdm_category.fields.price_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection