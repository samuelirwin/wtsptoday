@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.link.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.links.update', [$link->id]) }}" method="POST">
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
                <label for="mobile_no_without_plus">{{ trans('cruds.link.fields.mobile_no') }}</label>                
                <select data-live-search="true" class="form-control" name="mobile_no_without_plus" id="mobile_no_without_plus">
                    @foreach($mobile_numbers as $mobile_number)
                    <option value="{{ $mobile_number->mobile_no_without_plus }}">{{ $mobile_number->mobile_no_without_plus }}</option>
                    @endforeach
                </select>
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
<script>
    // To style all selects
    $('select').selectpicker();
</script>
@stop