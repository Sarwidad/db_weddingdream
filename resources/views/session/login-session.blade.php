@extends('layouts.user_type.guest')

@section('content')
<section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/curved-images/curved14.jpeg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <img src="../assets/img/logowd.png" class="navbar-brand-img h-100" style="height: 150px;width: 150px;"alt="...">
        <div class="row">
          <div class="col-md-6">
            <h1 class="text-white mb-2 mt-5" style="text-align:left;">WEBSITE ADMIN</h1>
              <br>
              <br>
              <h2 class="text-white mb-2 mt-5">Monitoring <br>aplikasi <br>wedding dream</h2>
              <br>
          </div>
          <div class="col-md-4">
              <div class="card" >
              <div class="card-body">
                  <form role="form" method="POST" action="/session">
                    @csrf
                    <label>Email :</label>
                    <div class="mb-3">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="admin@softui.com" aria-label="Email" aria-describedby="email-addon">
                      @error('email')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <label>Password : </label>
                    <div class="mb-3">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="secret" aria-label="Password" aria-describedby="password-addon">
                      @error('password')
                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                      @enderror
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-dark" style="background-color:E3B463;">Login</button>
                    </div>
                  </form>
                </div>
              </div>
              
</section>


@endsection
