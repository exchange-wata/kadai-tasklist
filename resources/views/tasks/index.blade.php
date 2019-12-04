@extends('layouts.app')

@section('content')
    @if (Auth::check())
    
        <h1>タスク一覧</h1>
        @if (count($tasks) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>stastu</th>
                        <th>タスク内容</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                    <tr>
                        @if (\Auth::id() == $task->user_id)
                            <td>{!! link_to_route('tasks.show', $task->id, [$task -> id], ['class' => 'text-info']) !!}</td>
                        @else
                            <td>{{ $task -> id }}</td>
                        @endif
                        <td>{{ $task -> status }}</td>
                        <td>{{ $task -> content }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $tasks->links('pagination::bootstrap-4') }}

        @endif
        
        {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-info btn-block']) !!}
    
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>Welcome to the Tasks</h1>
                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif


@endsection