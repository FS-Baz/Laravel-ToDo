@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Welcome') }}

                    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach($todos as $todo)
                    <li class="list-group-item"><a href="details/{{$todo->id}}" style="color: cornflowerblue; text-decoration: none;">{{$todo->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
                </div>
            </div>


            <div class="container">

        <a href="/create"><span style="margin-top: 20px;" class="btn btn-primary mg10">Create Todo</span></a>
    </div>
        </div>
    </div>
</div>
@endsection
