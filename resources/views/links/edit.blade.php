@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Link</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="get" action="{{ route('user.link.update', $link->id) }}">

			            <!-- CROSS Site Request Forgery Protection -->
			            @csrf

			            <div class="form-group">
			                <label>Custom name (subdomain)</label>
			                <input type="text" class="form-control" name="subdomain" value="{{$link->subdomain}}" id="subdomain">
			            </div>

			            <div class="form-group">
			                <label>Mobile no</label>
			                <input type="text" class="form-control" name="mobile_no" value="{{$link->mobile_no}}" id="mobileNo">
			            </div>

			            <div class="form-group">
			                <label>Custom message</label>
			                <textarea class="form-control" name="custom_message" id="customMessage" rows="4">{{$link->custom_msg}}</textarea>
			            </div>

			            <input type="submit" value="Save edit" class="btn btn-dark btn-block">
			        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
