@extends('admin.layout.layout')

@section('main')
    <div class="container">
        <div class="row justify-content-center h-100">

            <div class="col-11 col-md-8 col-lg-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{ route('admin.login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email" required>
                                            @error('email')
                                                <div class="text-danger text-center">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" name="password" required>
                                            @error('password')
                                            <div class="text-danger text-center">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <hr>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                    </form>
                                </div>
                            </div>\
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
