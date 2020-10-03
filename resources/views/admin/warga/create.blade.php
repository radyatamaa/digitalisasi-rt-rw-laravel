@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.warga.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.warga.store") }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group {{ $errors->has('warga_no_ktp') ? 'has-error' : '' }}">
                <label for="warga_no_ktp">{{ trans('global.warga.fields.warga_no_ktp') }}*</label>
                <input type="text" id="warga_no_ktp" name="warga_no_ktp" class="form-control" value="{{ old('warga_no_ktp', isset($warga) ? $warga->warga_no_ktp : '') }}">
                @if($errors->has('warga_no_ktp'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_no_ktp') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_no_ktp_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_no_kk') ? 'has-error' : '' }}">
                <label for="warga_no_kk">{{ trans('global.warga.fields.warga_no_kk') }}*</label>
                <input type="text" id="warga_no_kk" name="warga_no_kk" class="form-control" value="{{ old('warga_no_kk', isset($warga) ? $warga->warga_no_kk : '') }}">
                @if($errors->has('warga_no_kk'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_no_kk') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_no_kk_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_first_name') ? 'has-error' : '' }}">
                <label for="warga_first_name">{{ trans('global.warga.fields.warga_first_name') }}*</label>
                <input type="text" id="warga_first_name" name="warga_first_name" class="form-control" value="{{ old('warga_first_name', isset($warga) ? $warga->warga_first_name : '') }}">
                @if($errors->has('warga_first_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_first_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_first_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_last_name') ? 'has-error' : '' }}">
                <label for="warga_last_name">{{ trans('global.warga.fields.warga_last_name') }}*</label>
                <input type="text" id="warga_last_name" name="warga_last_name" class="form-control" value="{{ old('warga_last_name', isset($warga) ? $warga->warga_last_name : '') }}">
                @if($errors->has('warga_last_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_last_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_last_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_sex') ? 'has-error' : '' }}">
                <label for="warga_sex">{{ trans('global.warga.fields.warga_sex') }}*</label><br>
                <input type="radio" id="warga_sex" name="warga_sex" value="1">
                <label for="male">Male</label><br>
                <input type="radio" id="warga_sex" name="warga_sex" value="2">
                <label for="female">Female</label><br>
         
            </div>

            <div class="form-group {{ $errors->has('warga_religion') ? 'has-error' : '' }}">
                <label for="warga_religion">{{ trans('global.warga.fields.warga_religion') }}*
                <select name="warga_religion" id="warga_religion" class="form-control select2">
                    @foreach($religions as $id => $religion)
                        <option value="{{ $id }}" {{ (in_array($id, old('warga_religion', [])) || isset($warga) && $warga->warga_religion->contains($id)) ? 'selected' : '' }}>
                            {{ $religion }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('religion'))
                    <em class="invalid-feedback">
                        {{ $errors->first('religion') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_religion_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_address') ? 'has-error' : '' }}">
                <label for="warga_address">{{ trans('global.warga.fields.warga_address') }}*</label>
                <input type="text" id="warga_address" name="warga_address" class="form-control" value="{{ old('warga_address', isset($warga) ? $warga->warga_address : '') }}">
                @if($errors->has('warga_address'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_address') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_address_helper') }}
                </p>
            </div>

    

            <div class="form-group {{ $errors->has('warga_address_code') ? 'has-error' : '' }}">
                <label for="warga_address_code">{{ trans('global.warga.fields.warga_address_code') }}*
                <select name="warga_address_code" id="warga_address_code" class="form-control select2">
                    @foreach($master_alamats as $id => $master_alamat)
                        <option value="{{ $id }}" {{ (in_array($id, old('warga_address_code', [])) || isset($warga) && $warga->warga_address_code->contains($id)) ? 'selected' : '' }}>
                            {{ $master_alamat }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('master_alamat'))
                    <em class="invalid-feedback">
                        {{ $errors->first('master_alamat') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_address_code_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_job') ? 'has-error' : '' }}">
                <label for="warga_job">{{ trans('global.warga.fields.warga_job') }}*
                <select name="warga_job" id="warga_job" class="form-control select2">
                    @foreach($jobs as $id => $job)
                        <option value="{{ $id }}" {{ (in_array($id, old('warga_job', [])) || isset($warga) && $warga->warga_job->contains($id)) ? 'selected' : '' }}>
                            {{ $job }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <em class="invalid-feedback">
                        {{ $errors->first('job') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_job_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('warga_salary_range') ? 'has-error' : '' }}">
                <label for="warga_salary_range">{{ trans('global.warga.fields.warga_salary_range') }}*</label>
                <input type="text" id="warga_salary_range" name="warga_salary_range" class="form-control" value="{{ old('warga_salary_range', isset($warga) ? $warga->warga_salary_range : '') }}">
                @if($errors->has('warga_salary_range'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_salary_range') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_salary_range_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_phone') ? 'has-error' : '' }}">
                <label for="warga_phone">{{ trans('global.warga.fields.warga_phone') }}*</label>
                <input type="text" id="warga_phone" name="warga_phone" class="form-control" value="{{ old('warga_phone', isset($warga) ? $warga->warga_phone : '') }}">
                @if($errors->has('warga_phone'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_phone') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_phone_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_email') ? 'has-error' : '' }}">
                <label for="warga_email">{{ trans('global.warga.fields.warga_email') }}*</label>
                <input type="text" id="warga_email" name="warga_email" class="form-control" value="{{ old('warga_email', isset($warga) ? $warga->warga_email : '') }}">
                @if($errors->has('warga_email'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_email') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_email_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_birth_date') ? 'has-error' : '' }}">
                <label for="warga_birth_date">{{ trans('global.warga.fields.warga_birth_date') }}*</label>
                <input type="date" id="warga_birth_date" name="warga_birth_date" class="form-control" value="{{ old('warga_birth_date', isset($warga) ? $warga->warga_birth_date : '') }}">
                @if($errors->has('warga_birth_date'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_birth_date') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_birth_date_helper') }}
                </p>
            </div>
                        
       

            <div class="form-group {{ $errors->has('warga_is_ktp_sama_domisili') ? 'has-error' : '' }}">
                <label for="warga_is_ktp_sama_domisili">{{ trans('global.warga.fields.warga_is_ktp_sama_domisili') }}*</label><br>
                <input type="radio" id="warga_is_ktp_sama_domisili" name="warga_is_ktp_sama_domisili" value="1">
                <label for="ya">Ya</label><br>
                <input type="radio" id="warga_is_ktp_sama_domisili" name="warga_is_ktp_sama_domisili" value="2">
                <label for="tidak">Tidak</label><br>
         
            </div>

            <div class="form-group {{ $errors->has('warga_join_date') ? 'has-error' : '' }}">
                <label for="warga_join_date">{{ trans('global.warga.fields.warga_join_date') }}*</label>
                <input type="date" id="warga_join_date" name="warga_join_date" class="form-control" value="{{ old('warga_join_date', isset($warga) ? $warga->warga_join_date : '') }}">
                @if($errors->has('warga_join_date'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_join_date') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_join_date_helper') }}
                </p>
            </div>

            

            <div class="form-group {{ $errors->has('warga_pendidikan') ? 'has-error' : '' }}">
                <label for="warga_pendidikan">{{ trans('global.warga.fields.warga_pendidikan') }}*
                <select name="warga_pendidikan" id="warga_pendidikan" class="form-control select2">
                    @foreach($pendidikans as $id => $pendidikan)
                        <option value="{{ $id }}" {{ (in_array($id, old('warga_pendidikan', [])) || isset($warga) && $warga->warga_pendidikan->contains($id)) ? 'selected' : '' }}>
                            {{ $pendidikan }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('pendidikan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('pendidikan') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_pendidikan_helper') }}
                </p>
            </div>


            <div class="form-group {{ $errors->has('warga_rt') ? 'has-error' : '' }}">
                <label for="warga_rt">{{ trans('global.warga.fields.warga_rt') }}*
                <select name="warga_rt" id="warga_rt" class="form-control select2">
                    @foreach($rts as $id => $rt)
                        <option value="{{ $id }}" {{ (in_array($id, old('warga_rt', [])) || isset($warga) && $warga->warga_rt->contains($id)) ? 'selected' : '' }}>
                            {{ $rt }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('rt'))
                    <em class="invalid-feedback">
                        {{ $errors->first('rt') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_rt_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('warga_status') ? 'has-error' : '' }}">
                <label for="warga_status">{{ trans('global.warga.fields.warga_status') }}*</label>
                <input type="text" id="warga_status" name="warga_status" class="form-control" value="{{ old('warga_status', isset($warga) ? $warga->warga_status : '') }}">
                @if($errors->has('warga_status'))
                <em class="invalid-feedback">
                    {{ $errors->first('warga_status') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.warga.fields.warga_status_helper') }}
                </p>
            </div>
            
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection