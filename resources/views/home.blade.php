@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        You are logged in!
                    <a href = "{{route('admin.doctors.index')}}">Welcome to Hospital booking appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection