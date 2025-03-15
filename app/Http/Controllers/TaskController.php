<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }
    public function create(Request $request)
    {
        // $name = $_POST['name'];
        // DB::table('tasks')->insert(['name' => $name]);

        $validated = $request->validate([
            'name' => 'required|max:15|min:3'
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->save();
        return redirect()->back();
    }
    public function edit($id)
    {
        // $task = DB::table('tasks')->where('id', $id)->first();
        $task = Task::findOrFail($id);

        // $tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        return view('tasks', compact('task', 'tasks'));
    }
    public function update(Request $request)
    {
        // $id = $_POST['id'];
        // DB::table('tasks')->where('id', $id)->update(['name' => $_POST['name']]);

        $validated = $request->validate([
            'name' => 'required|max:15|min:3'
        ]);

        $task = Task::findOrFail($request->id);
        $task->name = $request->name;
        $task->save();
        return redirect('tasks');
    }
    public function destroy($id)
    {
        // DB::table('tasks')->where('id', $id)->delete();
        //First Way
        /*
            $task = Task::findOrFail($id);
            $task->delete();
        */
        //Second Way
        Task::destroy($id);

        return redirect('tasks');
    }
}
