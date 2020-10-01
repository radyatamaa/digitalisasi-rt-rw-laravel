@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('global.event.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.event.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('event_name') ? 'has-error' : '' }}">
                <label for="event_name">{{ trans('global.event.fields.event_name') }}*</label>
                <input type="text" id="event_name" name="event_name" class="form-control" value="{{ old('event_name', isset($event) ? $event->event_name : '') }}">
                @if($errors->has('event_name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('event_name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.event.fields.event_name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('event_rt') ? 'has-error' : '' }}">
                <label for="event_rt">{{ trans('global.event.fields.event_rt') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                <select name="event_rt" id="event_rt" class="form-control select2">
                    @foreach($event_rt as $id => $event_rt)
                        <option value="{{ $id }}" {{ (in_array($id, old('event_rt', [])) || isset($event) && $event->event_rt->contains($id)) ? 'selected' : '' }}>
                            {{ $event_rt }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('event_rt'))
                    <em class="invalid-feedback">
                        {{ $errors->first('event_rt') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.event.fields.event_rt_helper') }}
                </p>
            </div>
            


            <div class="form-group {{ $errors->has('event_category') ? 'has-error' : '' }}">
                <label for="event_category">{{ trans('global.event.fields.event_category') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                <select name="event_category" id="event_category" class="form-control select2">
                    @foreach($event_category as $id => $event_category)
                        <option value="{{ $id }}" {{ (in_array($id, old('event_category', [])) || isset($event) && $event->event_category->contains($id)) ? 'selected' : '' }}>
                            {{ $event_category }}
                        </option>
                    @endforeach
                </select>
                @if($errors->has('event_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('event_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.event.fields.event_category_helper') }}
                </p>
            </div>

            
            <div class="form-group {{ $errors->has('event_date') ? 'has-error' : '' }}">
                <label for="event_date">{{ trans('global.event.fields.event_date') }}</label>
                <input type="date" id="event_date" name="event_date" class="form-control" value="{{ old('event_date', isset($event) ? $event->event_date : '') }}" step="0.01">
                @if($errors->has('event_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.event.fields.event_date_helper') }}
                </p>
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection