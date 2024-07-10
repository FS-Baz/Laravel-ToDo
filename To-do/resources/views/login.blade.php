@extends('layouts.app')
@section('title')
    Login
@endsection
@section('content')

    <form action="auth-user" method="post" class="mt-4 p-4">
    @csrf
    <div class="form-group m-3">
            <label for="name">User Name</label>
            <input type="text" class="form-control" value="" name="email">
    </div>
    <div class="form-group m-3">
            <label for="name">Password</label>
            <input type="password" class="form-control" value="" name="password">
    </div>
    <div class="form-group m-3">
            <input type="submit" class="btn btn-primary float-end" value="Login">
        </div>
        </form>
@endsection