@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <center><h1>Log In</h1></center>
            @if(count($errors) > 0)
                <div class="alert alert-danger err">
                    @foreach($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            @endif
            <form action="{{route('user.login')}}" method="post">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" type="text" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input class="form-control" type="password" id="password" name="password">
                </div>
                <center>
                    <button type="submit" class="btn btn-success">Log In</button>
                </center>
                {{csrf_field()}}
            </form>
            <br>
            <a class="btn btn-primary" href="{{url('/auth/facebook')}}" id="btn-fblogin">
                <i class="fa fa-facebook"></i> Login with Facebook
            </a>
            <a class="btn btn-primary" href="{{ url('/auth/google') }}" id="btn-gologin">
                <i class="fa fa-google"></i> Login with Google
            </a>
            <br><br>
            <h4 class="newAcc">Don't have an Account? <a class="newAcc" href="{{ route('user.signup') }}">Sign up For
                    Free!</a></h4>
        </div>
    </div>
@endsection