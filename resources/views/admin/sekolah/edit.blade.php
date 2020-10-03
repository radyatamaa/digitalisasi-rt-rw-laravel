@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.sekolah.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.sekolah.update", [$sekolah->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('sekolah_pendidikan') ? 'has-error' : '' }}">
                <label for="sekolah_pendidikan">{{ trans('global.sekolah.fields.sekolah_pendidikan') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                    <select name="sekolah_pendidikan" id="sekolah_pendidikan" class="form-control select2">
                        @foreach($sekolah_pendidikan as $id => $sekolah_pendidikan)
                        <option value="{{ $id }}" {{ (in_array($id, old('sekolah_pendidikan', [])) || isset($sekolah) && $sekolah->sekolah_pendidikan) ? 'selected' : '' }}>
                            {{ $sekolah_pendidikan }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('sekolah_pendidikan'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sekolah_pendidikan') }}
                    </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.sekolah.fields.sekolah_pendidikan_helper') }}
                    </p>
            </div>
            <div class="form-group {{ $errors->has('sekolah_name') ? 'has-error' : '' }}">
                <label for="sekolah_name">{{ trans('global.sekolah.fields.sekolah_name') }}*</label>
                <input type="text" id="sekolah_name" name="sekolah_name" class="form-control" value="{{ old('sekolah_name', isset($sekolah) ? $sekolah->sekolah_name : '') }}">
                @if($errors->has('sekolah_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('sekolah_name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.sekolah.fields.sekolah_name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('sekolah_wilayah') ? 'has-error' : '' }}">
                <label for="sekolah_wilayah">{{ trans('global.sekolah.fields.sekolah_wilayah') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                    <select name="sekolah_wilayah" id="sekolah_wilayah" class="form-control select2">
                        @foreach($sekolah_wilayah as $id => $sekolah_wilayah)
                        <option value="{{ $id }}" {{ (in_array($id, old('sekolah_wilayah', [])) || isset($sekolah) && $sekolah->sekolah_wilayah) ? 'selected' : '' }}>
                            {{ $sekolah_wilayah }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('sekolah_wilayah'))
                    <em class="invalid-feedback">
                        {{ $errors->first('sekolah_wilayah') }}
                    </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.sekolah.fields.sekolah_wilayah_helper') }}
                    </p>
            </div>




            <!-- <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                <label for="ins_category">{{ trans('global.insidental.fields.ins_category') }}*</label>
                <input type="text" id="ins_category" name="ins_category" class="form-control" value="{{ old('ins_category', isset($insidental) ? $insidental->ins_category : '') }}">
                @if($errors->has('ins_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_category_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection