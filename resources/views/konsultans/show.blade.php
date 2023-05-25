@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Informasi Profil') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('konsultans.update', $konsultan->id) }}" method="POST" role="form text-left">
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
                        <header style="text-align: center;">
                            <div class="avatar avatar-xxl position-relative" >
                                <img src="../assets/img/bruce-mars.jpg" alt="..." class="avatar-initials rounded-circle" >
                                <a href="javascript:;" class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2">
                                    <i class="fa fa-plus top-0" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Foto"></i>
                                </a>
                            </div>
                        </header>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="konsultan-name" class="form-control-label">{{ __('Nama Lengkap :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('konsultan.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $konsultan->name }}" type="text" placeholder="Name" id="konsultan-name" name="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="konsultan-alamat" class="form-control-label">{{ __('Email :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $konsultan->email }}" type="email" placeholder="@example.com" id="konsultan-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        @foreach ($konsultan->konsultans as $k)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">{{ 'Alamat' }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('konsultan.alamat')border border-danger rounded-3 @enderror">
                                    <textarea class="form-control" id="alamat" rows="5" placeholder="Alamat" name="alamat">{{ $k->alamat }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <label for="konsultan.password" class="form-control-label">{{ __('Password :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('konsultan.password')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="40770888444" id="number" name="password" value="{{ $konsultan->password }}">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="konsultan.role" class="form-control-label">{{ __('Role :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('konsultan.role') border border-danger rounded-3 @enderror">
                                    <select class="form-control" type="text" placeholder="Role" id="name" name="role" value="{{ $konsultan->role }}">
                                        <option>{{ $konsultan->role }}</option>
                                        <option>Customer</option>
                                        <option>Vendor</option>
                                        <option>Wedding Konsultan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        @foreach ($konsultan->konsultans as $k)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="desc_konsultan">{{ 'Deskripsi' }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('konsultan.desc_konsultan')border border-danger rounded-3 @enderror">
                                    <textarea class="form-control" id="desc_konsultan" rows="5" placeholder="Deskripsi" name="about_me">{{ $k->desc_konsultan }}</textarea>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection