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

                    You are logged in!

                    {!! Form::open(['url' => '/ejemplo']) !!}
                        {!! Form::label('email', 'E-Mail Address') !!}
                        {!! Form::label('email', 'E-Mail Address', ['class' => 'awesome']) !!}
                        {!! Form::text('username') !!}
                        {!! Form::password('password', ['class' => 'awesome']) !!}
                        {!! Form::checkbox('name', 'value') !!}
                        {!! Form::select('size', ['L' => 'Large', 'S' => 'Small']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
