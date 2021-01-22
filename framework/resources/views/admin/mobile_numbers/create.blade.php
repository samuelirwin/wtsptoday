@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.mobile_number.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route('admin.mobile_numbers.store') }}" method="POST">
            @csrf
            <div class="form-group {{ $errors->has('mobile_no') ? 'has-error' : '' }}">
                <label for="mobile_no">{{ trans('cruds.link.fields.mobile_no') }}</label>
                
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <select data-live-search="true" class="form-control" name="calling_code" id="calling_codes">
                            @foreach($countries as $country)
                            <option value="{{ $country->calling_code }}">{{ $country->name }} {{ '+' . $country->calling_code }}</option>
                            @endforeach
                        </select> 
                    </div>
                    <div class="col-md-10 mb-3">
                        <input type="number" id="mobile_no" name="mobile_no" class="form-control" value="{{ old('mobile_no', isset($link) ? $link->mobile_no : '') }}" step="0.01">
                        @if($errors->has('mobile_no'))
                            <em class="invalid-feedback">
                                {{ $errors->first('mobile_no') }}
                            </em>
                        @endif
                    </div>
                </div>
                <p class="helper-block">
                    {{ trans('cruds.link.fields.mobile_no_helper') }}
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