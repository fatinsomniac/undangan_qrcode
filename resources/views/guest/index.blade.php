@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Input Data Tamu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/guest/create" class="btn btn-primary"> <i class="fa fa-plus"></i> Tamu</a>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Instansi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>

                        @foreach($guests as $post)
                        <tbody>
                            <tr>
                                <td><a href="/guest/{{$post->id}}/preview">{{$post['instansi']}}</a></td>
                                <td>
                                    <a href="/guest/{{ $post->id }}/edit" class="btn btn-warning">Edit</a>
                                    |
                                    <a href="/guest/{{ $post->id }}" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        </tbody>            
                        @endforeach
                    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
