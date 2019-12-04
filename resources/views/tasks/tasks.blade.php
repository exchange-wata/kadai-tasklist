<ul class="list-unstyled">
    @foreach ($tasks as $task)
        <li class="media mb-3 border-bottom">
            <img class="mr-2 rounded" src="{{ Gravatar::src($task->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $task->user->name, ['id' => $task->user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
                </div>
                <div>
                    <p class="mb-0　text-wrap text-break">タスク内容：{!! nl2br(e($task->content)) !!}</p>
                    <p class="mb-0">ステータス：{!! nl2br(e($task->status)) !!}</p>
                </div>
                <div class="mb-2 btn-group">
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                        {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id], ['class' => 'btn btn-info btn-sm mb-3']) !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
<!--{{ $tasks->links('pagination::bootstrap-4') }}-->