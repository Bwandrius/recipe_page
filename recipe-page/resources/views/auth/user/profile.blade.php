@extends('components/home_page_layout')
@section('title', 'User Profile')
@section('content')
    <br>
    @include('components.alert.success_message')
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
                                    <strong>
                                        <a href="{{ route('admin.recipes') }}" class="button" aria-current="page">
                                            ADMIN CONTROLS
                                        </a>
                                    </strong>
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
                        <div style="display: flex; align-content: space-between;">
                            <div class="col-sm-10">
                                <a href="{{ route('user.change.password') }}" class="btn btn-primary">Change Password</a>
                            </div>
                            <div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary" aria-current="page">
                                        <strong>Logout</strong>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
