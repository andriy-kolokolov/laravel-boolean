<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{

    private $validations = [
        'done'          => 'required|boolean',
        'urgent'        => 'required|boolean',
        'creation_date' => 'required|date',
        'expire_date'   => 'required|date',
        'title'         => 'required|string|max:50',
        'details'       => 'required|string',
        'image'         => 'required|string|max:300',
    ];

    private $validationMessages = [
        'required' => 'Il campo :attribute è richiesto.',
        'boolean' => 'Il campo :attribute deve essere Vero o Falso.',
        'date' => 'Il campo :attribute deve essere una data valida.',
        'max' => 'Il campo :attribute non deve superare i :max caratteri.',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //data validation
        $request->validate($this->validations, $this->validationMessages);

        $data = $request->all();

        $newTask = new Task();

        $newTask->done              = $data['done'];
        $newTask->urgent            = $data['urgent'];
        $newTask->creation_date     = $data['creation_date'];
        $newTask->expire_date       = $data['expire_date'];
        $newTask->title             = $data['title'];
        $newTask->details           = $data['details'];
        $newTask->image             = $data['image'];

        $newTask->save();

        return redirect()->route('tasks.index', ['task' => $newTask->id])->with('status', 'Task created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate($this->validations, $this->validationMessages);

        $data = $request->all();

        $task->done              = $data['done'];
        $task->urgent            = $data['urgent'];
        $task->creation_date     = $data['creation_date'];
        $task->expire_date       = $data['expire_date'];
        $task->title             = $data['title'];
        $task->details           = $data['details'];
        $task->image             = $data['image'];

        $task->update();

        return to_route('tasks.show', ['task' => $task->id])->with('update_success', 'Todo modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);

        if ($task === null) {
            return redirect()->route('tasks.index')->with('delete_success', $task, 'Todo non trovato...');
        }

        $task->delete();

        return redirect()->route('tasks.index')->with('delete_success', $task, 'Todo cancellato con successo!');
    }

    public function toggleDone(Request $request, Task $task)
    {
        $task->done = $request->input('done');
        $task->save();

        return redirect()->route('tasks.index')->with('update_success', 'Task updated successfully!');
    }
}
