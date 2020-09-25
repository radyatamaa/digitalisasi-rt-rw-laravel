@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.master_gaji.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.master_gaji.update", [$master_gaji->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('salary_start') ? 'has-error' : '' }}">
                <label for="salary_start">{{ trans('global.master_gaji.fields.salary_start') }}*</label>
                <input type="text" id="salary_start" name="salary_start" class="form-control" value="{{ old('salary_start', isset($master_gaji) ? $master_gaji->salary_start : '') }}">
                @if($errors->has('salary_start'))
                <em class="invalid-feedback">
                    {{ $errors->first('salary_start') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_gaji.fields.salary_start_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('salary_end') ? 'has-error' : '' }}">
                <label for="salary_end">{{ trans('global.master_gaji.fields.salary_end') }}*</label>
                <input type="text" id="salary_end" name="salary_end" class="form-control" value="{{ old('salary_end', isset($master_gaji) ? $master_gaji->salary_end : '') }}">
                @if($errors->has('salary_end'))
                <em class="invalid-feedback">
                    {{ $errors->first('salary_end') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.master_gaji.fields.salary_end_helper') }}
                </p>
            </div>


            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection