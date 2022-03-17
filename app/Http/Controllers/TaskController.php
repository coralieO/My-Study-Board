<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($auth)
    {
        if ($auth == 'user' && auth()->user()->role === 'user'){
           return Inertia::render('UserTasks/Tasks/TaskCreate');
        }
        if ($auth == 'admin' && auth()->user()->role === 'admin'){
            return Inertia::render('AdminTasks/Tasks/TaskCreate');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$auth)
    {
        $newTask = new Task;
        $newTask->Title = $request->task["Title"];
        $newTask->Description = $request->task["Description"];
        $newTask->Status = $request->task["Status"];
        $newTask->save();


        if ($auth == 'user' && auth()->user()->role === 'user'){
            return  $newTask && redirect()->route('User');
        }
        if ($auth == 'admin' && auth()->user()->role === 'admin'){
            return $newTask && redirect()->route('Admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $auth)
    {
        $task = Task::findOrFail($id);

        if ($auth == 'user' && auth()->user()->role === 'user'){
            return Inertia::render("UserTasks/Tasks/TaskDetail", [
                "tasks" => $task
            ]);
        }
        if ($auth == 'admin' && auth()->user()->role === 'admin'){
            return Inertia::render("AdminTasks/Tasks/TaskDetail", [
                "tasks" => $task
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$auth)
    {
        $task = Task::findOrFail($id);
        if ($auth == 'user' && auth()->user()->role === 'user'){
            return Inertia::render('UserTasks/Tasks/TaskEdit', [
                "tasks" => $task
            ]);
        }
        if ($auth == 'admin' && auth()->user()->role === 'admin'){
            return Inertia::render('AdminTasks/Tasks/TaskEdit', [
                "tasks" => $task
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
    public function update(Request $request, $id,$auth)
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
    public function destroy($id,$auth)
    {
        $client = Task::findOrFail($id);
            $client->delete();

            if ($auth == 'user' && auth()->user()->role === 'user'){
                return   redirect()->route('User');
            }
            if ($auth == 'admin' && auth()->user()->role === 'admin'){
                return redirect()->route('Admin');
            }
    }
}
