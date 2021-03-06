<?php

namespace App\Http\Controllers\User;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')->where('user_id', '=', Auth::user()->id)->orderBy('create_at','desc')->get();

        return Inertia::render('User', [
            "tasks" => $tasks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
           return Inertia::render('UserTasks/TaskCreate');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request, [
            "Description" => ['required'],
            "Title" => ['required'],
            "Status" => ['required'],
        ]);
        Task::create([
            'Title' => request('Title'),
            'Description' => request('Description'),
            'Status' => request('Status'),
            'user_id' => auth()->id(),
            'create_at' => now()->format('Y-m-d')
        ]);
        //   Task::create($request->only("Title","Description", "Status"));
            return  redirect()->route('User');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::findOrFail($id);

            return Inertia::render("UserTasks/TaskDetail", [
                "tasks" => $task
            ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);

            return Inertia::render('UserTasks/TaskEdit', [
                "tasks" => $task
            ]);
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

        $task = Task::findOrFail($id);

        $this->validate($request, [
            "Description" => ['required'],
            "Title" => ['required'],
            "Status" => ['required'],
        ]);

        $task->update($request->only("Title","Description", "Status"));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
            $task->delete();

            return   redirect()->route('User');
    }
}
