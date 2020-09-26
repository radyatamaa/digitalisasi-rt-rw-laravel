@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.master_alamat.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.master_alamat.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('address_code_name') ? 'has-error' : '' }}">
                <label for="address_code_name">{{ trans('global.master_alamat.fields.address_code_name') }}*</label>
                <input type="text" id="address_code_name" name="address_code_name" class="form-control" value="{{ old('address_code_name', isset($master_alamat) ? $master_alamat->address_code_name : '') }}">
                @if($errors->has('address_code_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('address_code_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_alamat.fields.address_code_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('address_code_rt') ? 'has-error' : '' }}">
                <label for="address_code_rt">{{ trans('global.master_alamat.fields.address_code_rt') }}*</label>
                <input type="text" id="address_code_rt" name="address_code_rt" class="form-control" value="{{ old('address_code_rt', isset($master_alamat) ? $master_alamat->address_code_rt : '') }}">
                @if($errors->has('address_code_rt'))
                <em class="invalid-feedback">
                    {{ $errors->first('address_code_rt') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_alamat.fields.address_code_rt_helper') }}
                </p>
            </div>
            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.master_alamat.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($master_alamat) ? $master_alamat->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_alamat.fields.description_helper') }}
                </p>
            </div> -->
            <!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.master_alamat.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($master_alamat) ? $master_alamat->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_alamat.fields.price_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection