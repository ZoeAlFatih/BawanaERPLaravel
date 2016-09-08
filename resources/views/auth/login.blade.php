@extends('layouts.login')

@section('content')
    <div class="animate form login_form">
        <section class="login_content">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {{ csrf_field() }}
                <h1>Login Form</h1>
                <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
                    <input type="text" name="nip" class="form-control" placeholder="Nip" value="{{ old('nip') }}" required autofocus />
                    @if ($errors->has('nip'))
                        <span class="help-block">
                            <strong>{{ $errors->first('nip') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div>
                    <button type="submit" class="btn btn-info btn-block">
                        Login
                    </button>
                </div>

                <div class="clearfix"></div>

                <div class="separator">

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-plane"></i> BawanaERP!</h1>
                        <p>©2016 All Rights Reserved. BawanaERP</p>
                    </div>
                </div>
            </form>
        </section>
    </div>
@endsection
