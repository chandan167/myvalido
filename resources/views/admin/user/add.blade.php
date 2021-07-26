@extends('admin.layout.layout')


@section('main')
    <div class="container-fluid">

        <!-- Page Heading -->
        @include('admin.layout.page_title')

        <div class="row">
            <div class="card shadow mb-4 col-md-8 mx-auto p-0">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $page_title }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.user.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex justify-content-center my-3">
                            <span class="d-inline" id="img-prev">
                                <label for="profile_image" class="position-relative">
                                    <img src="{{ asset('placeholder.png') }}"
                                        style="width: 150px; height: 150px; border-radius: 100%; cursor: pointer;">
                                    <i class="seoicon-link-bold text-danger position-absolute" style="font-size: 20px;
                                            bottom: 20px;
                                            left: 122px;"></i>
                                </label>
                                @error('profile_image')
                                    <div class="text-danger text-center">{{ $message }}</div>
                                @enderror

                                <input type="file" class="d-none" id="profile_image" name="profile_image"
                                    accept="image/jgeg,image/jpg,image/png">
                            </span>
                        </div>
                        <div class="row">
                            <div class="col-12 mx-auto form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" placeholder="Enter Name" class="form-control" value="{{old('name')}}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mx-auto form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" placeholder="Enter Email" class="form-control" value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mx-auto form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" name="phone" placeholder="Enter Phone" class="form-control" value="{{old('phone')}}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mx-auto form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" placeholder="Enter Password"
                                    class="form-control">
                                @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mx-auto form-group">
                                <label for="password_confirmation">Password confirmation</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Enter Password Confirmation"
                                    class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <button class="btn btn-primary btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection
