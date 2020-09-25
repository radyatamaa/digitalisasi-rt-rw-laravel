@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.master_pekerjaan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.master_pekerjaan.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('job_name') ? 'has-error' : '' }}">
                <label for="job_name">{{ trans('global.master_pekerjaan.fields.job_name') }}*</label>
                <input type="text" id="job_name" name="job_name" class="form-control" value="{{ old('job_name', isset($master_pekerjaan) ? $master_pekerjaan->job_name : '') }}">
                @if($errors->has('job_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('job_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_pekerjaan.fields.job_name_helper') }}
                </p>
            </div>
            <!-- <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ trans('global.master_pekerjaan.fields.description') }}</label>
                <textarea id="description" name="description" class="form-control ">{{ old('description', isset($master_pekerjaan) ? $master_pekerjaan->description : '') }}</textarea>
                @if($errors->has('description'))
                    <em class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_pekerjaan.fields.description_helper') }}
                </p>
            </div> -->
            <!-- <div class="form-group {{ $errors->has('price') ? 'has-error' : '' }}">
                <label for="price">{{ trans('global.master_pekerjaan.fields.price') }}</label>
                <input type="number" id="price" name="price" class="form-control" value="{{ old('price', isset($master_pekerjaan) ? $master_pekerjaan->price : '') }}" step="0.01">
                @if($errors->has('price'))
                    <em class="invalid-feedback">
                        {{ $errors->first('price') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_pekerjaan.fields.price_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection