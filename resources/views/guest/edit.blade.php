@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Data Tamu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {!! Form::model($guests, array('route' => ['guest.update', $guests->id], 'method'=>'PUT')) !!}
                    <div class="form-group{{ $errors->has('instansi') ? ' has-error' : '' }}">
                        {!! Form::label('instansi','Nama Instansi :') !!}
                        {!! Form::text('instansi', null, ['class' => 'form-control']) !!}

                        {{-- Untuk notif error --}}
                        @if($errors->has('instansi'))
                            <div class="help-block with-errors">
                                <ul class="alert alert-danger"><li>{{ $errors->first('instansi') }}</li></ul>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::button('Update', [ 'type' => 'submit', 'class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection