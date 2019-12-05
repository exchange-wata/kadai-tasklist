@extends('layouts.app')

@section('content')
    @if (Auth::check())

        <h1>タスクID : {{ $task->id }}の詳細ページ</h1>
        
        <table class="table table-hover">
            <tr>
                <th>id</th>
                <td>{{ $task -> id }}</td>
            </tr>
            <tr>
                <th>stastu</th>
                <td>{{ $task -> status }}</td>
            </tr>
            <tr>
                <th>タスク</th>
                <td>{{ $task -> content }}</td>
            </tr>
        </table>
    
        <div>
            {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-info btn-block mb-3']) !!}
        </div>
        <div> 
            {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                {!! Form::submit('削除', ['class' => 'btn btn-warning btn-block mb-3']) !!}
            {!! Form::close() !!}
        </div>
        <div>
            {!! link_to_route('tasks.index', 'タスク一覧へ戻る', ['id' => $task->id], ['class' => 'btn btn-light btn-block mb-3']) !!}
        </div>
        
    @endif
@endsection