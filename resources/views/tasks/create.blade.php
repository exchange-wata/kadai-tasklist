@extends('layouts.app')

@section('content')
    @if (Auth::check())

    <h1>タスクの新規作成ページ</h1>
    
    <div class="row">
        <div class="col">
            
            {!! Form::model($task, ['route' => 'tasks.store']) !!}
            
                <div class="form-group">
                    {!! Form::label('content', 'タスク内容:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('status', 'ステータス:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-info btn-block mb-3']) !!}
            
            {!! Form::close() !!}
            
            <div>
                {!! link_to_route('tasks.index', 'タスク一覧へ戻る', ['id' => $task->id], ['class' => 'btn btn-light btn-block mb-3']) !!}
            </div>
        </div>
    </div>

    @endif
@endsection