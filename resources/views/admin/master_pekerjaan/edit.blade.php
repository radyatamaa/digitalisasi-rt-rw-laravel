@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.master_pekerjaan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.master_pekerjaan.update", [$master_pekerjaan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection