@extends('layouts.app')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>Welcome to the TaskList</h1>
            {!! link_to_route('signup.get', 'ユーザー登録へ', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection