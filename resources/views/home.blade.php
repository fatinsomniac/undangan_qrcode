@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Selamat Datang <b>Admin</b>, di Sistem Absensi Guru menggunakan QR Code. 
                    <br>
                    System Copyright&copy; FatInsomniac Studio, Mahasiswa STMIK Subang and SMKN 1 CIKAUM
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
