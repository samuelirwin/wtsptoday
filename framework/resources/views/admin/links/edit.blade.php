@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.link.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.links.update", [$link->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('subdomain') ? 'has-error' : '' }}">
                <label for="subdomain">{{ trans('cruds.link.fields.subdomain') }}*</label>
                <input type="text" id="subdomain" name="subdomain" class="form-control" value="{{ old('subdomain', isset($link) ? $link->subdomain : '') }}" required>
                @if($errors->has('subdomain'))
                    <em class="invalid-feedback">
                        {{ $errors->first('subdomain') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.link.fields.subdomain_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : '' }}">
                <label for="mobile_no">{{ trans('cruds.link.fields.mobile_no') }}</label>
                <input type="number" id="mobile_no" name="mobile_no" class="form-control" value="{{ old('mobile_no', isset($link) ? $link->mobile_no : '') }}" step="0.01">
                @if($errors->has('mobile_no'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mobile_no') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.link.fields.mobile_no_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('custom_msg') ? 'has-error' : '' }}">
                <label for="custom_msg">{{ trans('cruds.link.fields.custom_msg') }}</label>
                <textarea id="custom_msg" name="custom_msg" class="form-control ">{{ old('custom_msg', isset($link) ? $link->custom_msg : '') }}</textarea>
                @if($errors->has('custom_msg'))
                    <em class="invalid-feedback">
                        {{ $errors->first('custom_msg') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.link.fields.custom_msg_helper') }}
                </p>
            </div>   
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

@section('scripts')

@stop