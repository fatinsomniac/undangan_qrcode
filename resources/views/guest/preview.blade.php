@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><center><h2>{!! $preview->instansi !!}</h2></center></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <center>{{QRCode::url('http://f6755115.ngrok.io/absensi/'.$preview->uuid)->setSize(5)->svg()}}</center>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
