@extends('layouts.app')

@section('content')
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
                    <td>{!! link_to_route('tasks.show', $task->id, [$task -> id]) !!}</td>
                    <td>{{ $task -> status }}</td>
                    <td>{{ $task -> content }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
    {!! link_to_route('tasks.create', '新規タスクの追加', [], ['class' => 'btn btn-light']) !!}

@endsection