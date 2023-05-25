@extends('layouts.user_type.auth')

@section('content')

<div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Data Konsultan</h5>
                        </div>
                        <a  href="{{ route('konsultans.create') }}" class="btn btn-primary btn-sm mb-0 {{ (Request::is('konsultans.create') ? 'active' : '') }}" type="button">+&nbsp; Tambah Akun</a>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Role
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Pembuatan
                                    </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tindakan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($konsultans as $konsultan)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $konsultan->id }}</p>
                                    </td>
                                    <td>
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $konsultan->name }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $konsultan->email }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ $konsultan->role}}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ $konsultan->created_at}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('konsultans.show', $konsultan->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Edit Konsultan">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>
                                        <span>
                                        <form action="{{ route('konsultans.destroy', $konsultan->id) }}" method="POST" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Hapus">
                                            @csrf
                                            @method('DELETE')
                                            <button style="border:none;outline:none;color:white;background-color:white;" type="submit" class="cursor-pointer fas fa-trash text-secondary"></button>
                                        </form> 
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection