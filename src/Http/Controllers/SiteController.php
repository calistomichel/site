<?php

namespace MichelCalisto\Site\Http\Controllers;

use MichelCalisto\Site\Models\Site;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        $items = Site::all();
        $total = Site::count();
        return Inertia::render('Site/Index', ['sites' => $items, 'total' => $total]);

        // return "Hola mundo";
        // return redirect()->route('site.create');
    }

    // public function create()
    // {
    //     $sites = Site::all();
    //     $submit = 'Add';
    //     return view('laloinsane.site.list', compact('sites', 'submit'));
    // }

    // public function store()
    // {
    //     $input = Request::all();
    //     Task::create($input);
    //     return redirect()->route('task.create');
    // }

    // public function edit($id)
    // {
    //     $tasks = Task::all();
    //     $task = $tasks->find($id);
    //     $submit = 'Update';
    //     return view('wisdmlabs.todolist.list', compact('tasks', 'task', 'submit'));
    // }

    // public function update($id)
    // {
    //     $input = Request::all();
    //     $task = Task::findOrFail($id);
    //     $task->update($input);
    //     return redirect()->route('task.create');
    // }

    // public function destroy($id)
    // {
    //     $task = Task::findOrFail($id);
    //     $task->delete();
    //     return redirect()->route('task.create');
    // }
}
