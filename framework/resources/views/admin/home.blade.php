@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            @if(session('status'))
                <div class="row mb-2">
                    <div class="col-lg-12">
                        <div class="alert alert-{{ session('status') }}" role="alert">{{ session('message') }}</div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Announcement&rsquo;s
                </div>

                <div class="card-body">                    
                    <ul>
                        <li> New features are being developed for the pro package features! Hang in there!</li>
                    </ul>

                    <div>
                    <h6>For help or feedback</h6>
                    <p>If you have questions or feedbacks, you can email to me directly at <a href="mailto:samuelirwin1992@gmail.com">samuelirwin1992@gmail.com</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>

                <div class="card-body">
                    <h3>Step&rsquo;s to get started!</h3>
                    <ol>
                        <li> Add mobile number. You can add more than one mobile numbers.</li>
                        <li> Create a link with your unique branding.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent

@endsection