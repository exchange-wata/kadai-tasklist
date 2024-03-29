<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(9);
            // $tasks = Task::orderBy('created_at', 'desc')->paginate(9);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        
        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        
        $task = new Task;
        $task->content = $request->content;
        $task->status = $request->status;
        $task->user_id = $user->id;
        $task->save();
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::id();
        $task = \App\Task::find($id);
        if(!isset($task->user_id)){
            return back();
        }elseif ($user === $task->user_id) {
            return view('tasks.show',[
                'user' => $user,
                'task' => $task,
            ]);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \Auth::id();
        $task = Task::find($id);
        
        if(!isset($task->user_id)){
            return back();
        }elseif ($user === $task->user_id) {
            return view('tasks.edit',[
                'user' => $user,
                'task' => $task,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \Auth::id();
        $task = Task::find($id);
        
        if(!isset($task->user_id)){
            return back();
        }elseif ($user === $task->user_id) {
            $this->validate($request, [
                'content' => 'required|max:191',
                'status' => 'required|max:10',
            ]);
            $task->content = $request->content;
            $task->status = $request->status;
            $task->save();
            
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = \App\Task::find($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
}
