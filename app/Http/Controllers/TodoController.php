<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Todos;

class TodoController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('index', [
            'todos' => Todos::all('task', 'id')
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $todo = new Todos;
        $todo->task = $request->task;
        $todo->save();

        return back()->with('message', 'Todo successfully created!');
    }

    public function update(Request $request, Todos $todo): RedirectResponse
    {
        $todo->task = $request->task;
        $todo->save();

        return back()->with('message', 'Todo successfully updated!');
    }

    public function destroy(Todos $todo): RedirectResponse
    {
        $todo->delete();
        return back()->with('message', 'Todo successfully deleted!');
    }
}
