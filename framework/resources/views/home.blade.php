@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="{{route('user.link.create')}}">Create link</a>
                </div>
                
            </div>
            <div class="card mt-5">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Custom link</th>
                            <th>Clicks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($links as $link)
                        <tr>
                            <td><a href="{{ $link->custom_url }}" target="_blank">{{ $link->custom_url }}</a></td>
                            <td>{{ $link->no_of_clicks }}</td>
                            <td><a href="{{ route('user.link.edit', $link->id) }}">Edit</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
