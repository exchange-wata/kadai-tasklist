<!--@extends('layouts.app')-->

<!--@section('content')-->
<!--    @if (Auth::check())-->
<!--        <div class="row">-->
<!--            <aside class="col-sm-4">-->
<!--                <div class="card mb-4">-->
<!--                    <div class="card-header">-->
<!--                        <h3 class="card-title">{{ Auth::user()->name }}</h3>-->
<!--                    </div>-->
<!--                    <div class="card-body">-->
<!--                        <img class="rounded img-fluid" src="{{ Gravatar::src(Auth::user()->email, 500) }}" alt="">-->
<!--                    </div>-->
<!--                </div>-->
                
<!--                 @if (Auth::id() == $user->id)-->
<!--                    {!! Form::open(['route' => 'tasks.store']) !!}-->
<!--                        <div class="form-group">-->
<!--                            {!! Form::label('content', 'タスク内容:') !!}-->
<!--                            {!! Form::text('content', null, ['class' => 'form-control']) !!}-->
<!--                        </div>-->
                        
<!--                        <div class="form-group">-->
<!--                            {!! Form::label('status', 'ステータス:') !!}-->
<!--                            {!! Form::text('status', null, ['class' => 'form-control']) !!}-->
<!--                        </div>-->
<!--                        {!! Form::submit('POST', ['class' => 'btn btn-info btn-block']) !!}-->
<!--                    {!! Form::close() !!}-->
<!--                @endif-->

<!--            </aside>-->
<!--            <div class="col-sm-8">-->
<!--                <h2>All TaskList</h2>-->
<!--                <hr>-->
<!--                <div class="overflow-auto" style="max-width: 730px; max-height: 530px;">-->
<!--                    @if (count($tasks) > 0)-->
<!--                        @include('tasks.tasks', ['tasks' => $tasks])-->
<!--                    @endif-->
<!--                </div>-->
<!--                <div class="mt-4">-->
<!--                    {{ $tasks->links('pagination::bootstrap-4') }}-->
<!--                </div>-->

<!--            </div>-->
<!--        </div>-->
<!--    @else-->
<!--        <div class="center jumbotron">-->
<!--            <div class="text-center">-->
<!--                <h1>Welcome to the Tasks</h1>-->
<!--                {!! link_to_route('signup.get', 'Sign up now!', [], ['class' => 'btn btn-lg btn-primary']) !!}-->
<!--            </div>-->
<!--        </div>-->
<!--    @endif-->
<!--@endsection-->