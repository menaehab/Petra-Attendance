<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Level;
use App\Http\Requests\GroupRequest;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin')->except('index');
    }
    public function index(): \Illuminate\Contracts\View\View
    {
        // $groups = Group::latest()->paginate(10);
        $groups = Group::all();
        return view('groups.index', compact('groups'));
    }

    public function create(): \Illuminate\Contracts\View\View
    {
        $levels = Level::all();
        return view('groups.create', compact('levels'));
    }

    public function store(GroupRequest $request): \Illuminate\Http\RedirectResponse
    {
        Group::create($request->validated());
        return redirect()->route('groups.index')->with('success', 'Created successfully');
    }

    // public function show(Group $group): \Illuminate\Contracts\View\View
    // {
    //     return view('groups.show', compact('group'));
    // }

    public function edit(Group $group): \Illuminate\Contracts\View\View
    {
        $levels = Level::all();
        return view('groups.edit', compact('group', 'levels'));
    }

    public function update(GroupRequest $request, Group $group): \Illuminate\Http\RedirectResponse
    {
        $data= $request->validated();
        $group->update([

            'name'=>$data['name'],
            'level'=>$data['level'],

        ]);

        return redirect()->route('groups.index')->with('success', 'Updated successfully');
    }

    public function destroy(Group $group): \Illuminate\Http\RedirectResponse
    {
        $group->delete();
        return redirect()->route('groups.index')->with('success', 'Deleted successfully');
    }
}
