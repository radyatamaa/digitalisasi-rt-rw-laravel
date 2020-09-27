@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.insidental.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.insidental.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('ins_name') ? 'has-error' : '' }}">
                <label for="ins_name">{{ trans('global.insidental.fields.ins_name') }}*</label>
                <input type="text" id="ins_name" name="ins_name" class="form-control" value="{{ old('ins_name', isset($insidental) ? $insidental->ins_name : '') }}">
                @if($errors->has('ins_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_name_helper') }}
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
            <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                <label for="ins_category">{{ trans('global.insidental.fields.ins_category') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                <select name="ins_category" id="ins_category" class="form-control select2">
                    @foreach($ins_category as $id => $ins_category)
                        <option value="{{ $id }}" {{ (in_array($id, old('ins_category', [])) || isset($insidental) && $insidental->ins_category->contains($id)) ? 'selected' : '' }}>
                            {{ $ins_category }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('ins_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_category_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ins_detail') ? 'has-error' : '' }}">
                <label for="ins_detail">{{ trans('global.insidental.fields.ins_detail') }}</label>
                <textarea id="ins_detail" name="ins_detail" class="form-control ">{{ old('ins_detail', isset($insidental) ? $insidental->ins_detail : '') }}</textarea>
                @if($errors->has('ins_detail'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_detail') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_detail_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('ins_date') ? 'has-error' : '' }}">
                <label for="ins_date">{{ trans('global.insidental.fields.ins_date') }}</label>
                <input type="date" id="ins_date" name="ins_date" class="form-control" value="{{ old('ins_date', isset($insidental) ? $insidental->ins_date : '') }}" step="0.01">
                @if($errors->has('ins_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_date_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection