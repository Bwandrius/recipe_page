@extends('components/home_page_layout')
@section('title', 'User Profile')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto mt-5">
                <div class="card">
                    <div class="card-header">
                        <h4>User Profile</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>User Name:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->name }}
                            </div>
                        </div>
                        <div class="row mb-3">
                            @if(auth()->user()->role == 'admin')
                                <div class="col-sm-8">
                                    <strong>ADMIN</strong>
                                </div>
                            @endif
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-4">
                                <strong>Email:</strong>
                            </div>
                            <div class="col-sm-8">
                                {{ $user->email }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#" class="btn btn-primary">Change Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
