@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="container-fluid py-4">
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('Informasi Profil') }}</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('vendors.update', $vendor->id) }}" method="POST" role="form text-left">
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
                                <label for="vendor-name" class="form-control-label">{{ __('Nama Lengkap :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('vendor.name')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $vendor->name }}" type="text" placeholder="Name" id="vendor-name" name="name">
                                    @error('name')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor-alamat" class="form-control-label">{{ __('Email :') }}</label>
                                <div class="@error('email')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $vendor->email }}" type="email" placeholder="@example.com" id="vendor-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        @foreach ($vendor->vendors as $v)
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vendor-jadwal" class="form-control-label">{{ __('Jadwal :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('vendor.jadwal')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $v->jadwal_vendor }}" type="date" placeholder="Jadwal" id="vendor-jadwal" name="jadwal">
                                    @error('jadwal')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor-range_harga" class="form-control-label">{{ __('Range Harga :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('range_harga')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $v->range_harga }}" type="range_harga" placeholder="1.000.000 - 10.000.000" id="vendor-range_harga" name="range_harga">
                                        @error('range_harga')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vendor.password" class="form-control-label">{{ __('Password :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('vendor.password')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="40770888444" id="number" name="password" value="{{ $vendor->password }}">
                                        @error('password')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor.role" class="form-control-label">{{ __('Role :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('vendor.role') border border-danger rounded-3 @enderror">
                                    <select class="form-control" type="text" placeholder="Role" id="name" name="role" value="{{ $vendor->role }}">
                                        <option>{{ $vendor->role }}</option>
                                        <option>Customer</option>
                                        <option>Vendor</option>
                                        <option>Wedding Konsultan</option>
                                    </select>
                                </div>
                            </div>
                            @foreach ($vendor->vendors as $v)
                            <div class="form-group">
                                <label for="vendor-kategori" class="form-control-label">{{ __('Kategori :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('kategori')border border-danger rounded-3 @enderror">
                                    <input class="form-control" value="{{ $v->kategori }}" type="kategori" placeholder="Kategori" id="vendor-kategori" name="kategori">
                                        @error('kategori')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat">{{ 'Alamat' }}
                                    <span style="color:red;" class="required has-text-danger">*</span>
                                    </label>
                                    <div class="@error('vendor.alamat')border border-danger rounded-3 @enderror">
                                        <textarea class="form-control" id="alamat" rows="8" placeholder="Alamat" name="alamat">{{ $v->alamat }}</textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="vendor.no_hp" class="form-control-label">{{ __('No Hp :') }}
                                <span style="color:red;" class="required has-text-danger">*</span>
                                </label>
                                <div class="@error('vendor.no_hp')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="40770888444" id="number" name="no_hp" value="{{ $v->no_hp }}">
                                        @error('no_hp')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="vendor.kontak" class="form-control-label">{{ __('Kontak :') }}</label>
                                <div class="@error('vendor.kontak')border border-danger rounded-3 @enderror">
                                    <input class="form-control" type="text" placeholder="40770888444" id="number" name="kontak" value="{{ $v->kontak_vendor }}">
                                        @error('kontak')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label for="deskripsi">{{ 'Deskripsi' }}
                                    <span style="color:red;" class="required has-text-danger">*</span>
                                    </label>
                                    <div class="@error('vendor.deskripsi')border border-danger rounded-3 @enderror">
                                        <textarea class="form-control" id="deskripsi" rows="5" placeholder="Deskripsi" name="deskripsi">{{ $v->desc_vendor }}</textarea>
                                    </div>
                                </div>
                            </div>
                    </div>
                    @endforeach
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Simpan' }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection