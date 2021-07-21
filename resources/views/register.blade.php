@extends('main')
@section("content")

@if ($errors->any())
    <div class="alert alert-danger">
            <strong>Sorry!</strong> There were some problems with your input.<br><br>
            <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
            </ul>
    </div>
@endif

<div class="container custom-login">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <form action="register" method="POST">
                @csrf

                <div class="form-group">     
                <label for="exampleInputEmail1">User</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="user name">
                </div>

                <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                </div>

                <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-default">Register</button>
            </form>
        </div>
    </div>
</div>
@endsection