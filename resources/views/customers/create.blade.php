@extends('layouts.user_type.auth')

@section('content')

<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpeg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">SELAMAT DATANG!</h1>
            <p class="text-lead text-white">Silahkan isi form berikut untuk membuat akun baru</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Buat Akun</h5>
            </div>

            <div class="card-body">
              <form role="form text-left" method="POST" action="{{ route('customers.store') }}">
                @csrf
                <div class="mb-3">
                <label for="name" class="col-md-4 col-form-label">Nama :</label>
                  <input type="text" class="form-control" placeholder="Nama" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                  @error('name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                <label for="name" class="col-md-4 col-form-label">Email :</label>
                  <input type="email" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                  @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                <label for="name" class="col-md-4 col-form-label">Password :</label>
                  <input type="password" class="form-control" placeholder="Password" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                  @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="mb-3">
                <label for="name" class="col-md-4 col-form-label">Role :</label>
                  <select type="role" class="form-control" placeholder="Role" name="role" id="role" aria-label="Role" aria-describedby="role-addon">
                      <option>==Pilih Role==</option>
                      <option>Admin</option>
                      <option>Customer</option>
                      <option>Vendor</option>
                      <option>Wedding Konsultan</option>
                  </select>
                  @error('role')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Buat Akun</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection