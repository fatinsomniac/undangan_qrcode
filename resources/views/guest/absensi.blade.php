@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Absen Tamu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::open(array('route' => 'absensi.prosesabsen','method'=>'POST')) !!}
                    <div class="form-group{{ $errors->has('uuid') ? ' has-error' : '' }}">
                        {!! Form::label('uuid','Masukan UUID :') !!}
                        {!! Form::text('uuid', null, ['class' => 'form-control']) !!}

                        {{-- Untuk notif error --}}
                        @if($errors->has('uuid'))
                            <div class="help-block with-errors">
                                <ul class="alert alert-danger"><li>{{ $errors->first('uuid') }}</li></ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::button('Proses', [ 'type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <br>
        </div>
        
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table class="table">
                <thead>
                    <tr>
                        <th>Instansi yang Hadir</th>
                        <th>Waktu Hadir</th>
                    </tr>
                </thead>
                @foreach($guests as $post)
                <tbody>
                    <tr>
                        <td>{{$post->instansi}}</td>                    
                        <td>{{$post->jam_hadir}}</td>                    
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