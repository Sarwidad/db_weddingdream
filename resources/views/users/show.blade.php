@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Profile Information') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('users.update', $user->id) }}" method="POST" role="form text-left">
                    @csrf
                    @method('PUT')
                    @if($errors->any())
                        <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                            <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                            <span class="alert-text text-white">
                            {{ session('success') }}</span>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                <i class="fa fa-close" aria-hidden="true"></i>
                            </button>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $user->name }}" type="text" placeholder="Name" id="user-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $user->email }}" type="email" placeholder="@example.com" id="user-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.password" class="form-control-label">{{ __('Password') }}</label>
                                <div class="@error('user.password')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="40770888444" id="number" name="password" value="{{ $user->password }}">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="user.role" class="form-control-label">{{ __('Role') }}</label>
                                <div class="@error('user.role') border border-danger rounded-3 @enderror">
                                    <select class="form-control" type="text" placeholder="Role" id="name" name="role" value="{{ $user->role }}">
                                    
                                        <option>{{ $user->role }}</option>
                                        <option>Customer</option>
                                        <option>Vendor</option>
                                        <option>Wedding Konsultan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="about">{{ 'About Me' }}</label>
                        <div class="@error('user.about')border border-danger rounded-3 @enderror">
                            <textarea class="form-control" id="about" rows="3" placeholder="Say something about yourself" name="about_me">{{ $user->about_me }}</textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection