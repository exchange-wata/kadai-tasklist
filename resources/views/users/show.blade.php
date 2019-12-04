@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card mb-4">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @if (Auth::id() == $user->id)
                {!! Form::open(['route' => 'tasks.store']) !!}
                    <div class="form-group">
                        {!! Form::label('content', 'タスク内容:') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    <div class="form-group">
                        {!! Form::label('status', 'ステータス:') !!}
                        {!! Form::text('status', null, ['class' => 'form-control']) !!}
                    </div>
                    {!! Form::submit('POST', ['class' => 'btn btn-info btn-block']) !!}
                {!! Form::close() !!}
            @endif

        </aside>
        <div class="col-sm-8">
            <ul class="nav nav-tabs nav-justified mb-3">
                <li class="nav-item"><a href="{{ route('users.show', ['id' => $user->id]) }}" class="nav-link {{ Request::is('users/' . $user->id) ? 'active' : '' }}">TimeLine <span class="badge badge-secondary">{{ $count_tasks }}</span></a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followings</a></li>
                <li class="nav-item"><a href="#" class="nav-link">Followers</a></li>
            </ul>
            <div class="overflow-auto" style="max-width: 730px; max-height: 530px;">
                @if (count($tasks) > 0)
                    @include('tasks.tasks', ['tasks' => $tasks, 'status' => $status])
                @endif
            </div>
            <div class="mt-4">
                {{ $tasks->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection