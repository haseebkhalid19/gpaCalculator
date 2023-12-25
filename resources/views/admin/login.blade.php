@extends('layouts.main')
@push('title')
    <title>Login</title>
@endpush

@section('main-section')
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login') }}">
                                    @csrf
                                    <div class="form-floating">
                                        <input class="form-control" id="inputEmail" type="name" name="name"
                                            placeholder="Username" />
                                        <label for="inputEmail">Username</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" type="password" name="password"
                                            placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @endif
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small"><a href="{{ route('register') }}">Need an account? Sign up!</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
