@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.keuangan_category.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.keuangan_category.update", [$keuangan_category->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('category_name') ? 'has-error' : '' }}">
                <label for="category_name">{{ trans('global.keuangan_category.fields.category_name') }}*</label>
                <input type="text" id="category_name" name="category_name" class="form-control" value="{{ old('category_name', isset($keuangan_category) ? $keuangan_category->category_name : '') }}">
                @if($errors->has('category_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('category_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.keuangan_category.fields.category_name_helper') }}
                </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection