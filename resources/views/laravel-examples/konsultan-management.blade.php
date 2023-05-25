@extends('layouts.user_type.auth')

@section('content')

<div>
    <!-- <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
            <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div> -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">All Konsultans</h5>
                        </div>
                        <a  href="{{ url('register-user') }}" class="btn bg-gradient-primary btn-sm mb-0 {{ (Request::is('register-user') ? 'active' : '') }}" type="button">+&nbsp; New Kosultan</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th> -->
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Name
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Creation Date
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($user as $us) { ?>
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $us->id ?></p>
                                    </td>
                                    <!-- <td>
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td> -->
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $us->name?></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $us->email?></p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0"><?php echo $us->role?></p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo $us->created_at?></span>
                                    </td>
                                    <td class="text-center">
                                        <a href="user-profile/{{$us->id}}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit user">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                        <a href="user-profile/delete/{{$us->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Hapus">
                                            <i class="cursor-pointer fas fa-trash text-secondary"></i>
                                        </span>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection