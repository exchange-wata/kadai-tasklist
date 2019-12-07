@extends('layouts.app')

@section('content')
    @if (Auth::check())
        
        <h1>タスクID : {{ $task->id }}の編集ページ</h1>
        
        <div class="row">
            <div class="col">
                
                {!! Form::model($task, ['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                
                    <div class="form-group">
                        {!! Form::label('content', 'タスク内容:') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス:') !!}
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    {!! Form::submit('更新', ['class' => 'btn btn-info btn-block mb-3']) !!}
                
                {!! Form::close() !!}
                
                <div>
                    {!! link_to_route('tasks.show', 'タスク詳細へ戻る', ['id' => $task->id], ['class' => 'btn btn-light btn-block mb-3']) !!}
                </div>
            </div>
        </div>
    @endif

@endsection