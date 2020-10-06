<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index() {
        $projects = Project::orderBy('id', 'desc')->paginate(10);
        $count = Project::count();
        return view('projects.index', compact('projects', 'count'));
    }
    public function show($id) {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
    }
    public function create() {
        return view ('projects.create');
    }
    public function store(request $request) {
        $request->validate([
            'name' => 'required|max:200',
            'desc' => 'required|max:200',
            'coverImage' => 'image|mimes:jpeg,jpg,png,bmp|max:1999'
        ]);
        if ($request->hasFile('coverImage')) {
            $file = $request->file('coverImage');
            $ext = $file->getClientOriginalExtension();
            $filename = 'coverImages'.'_'.time().'.'.$ext;
            $file->storeAs('public/coverImages', $filename);
        }
        else {
            $filename = 'noimage.png';
        }
        $project = new Project();
        $project->user_id = auth()->user()->id;
        $project->name = $request->name;
        $project->desc = $request->desc;
        $project->image = $filename;
        $project->save();
        return redirect('/projects')->with('status' , 'Project Added Successfuly !');
    }
    public function edit($id) {
        $project = Project::find($id);
        if (auth()->user()->id !== $project->user_id) {
            return redirect('/projects')->with('error', 'You Are Not Authorized');
        }
        return view('projects.edit', compact('project'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required|max:200',
            'desc' => 'required|max:200'
        ]);
        $project =  Project::find($id);
        $project->name = $request->name;
        $project->desc = $request->desc;
        $project->save();
        return redirect('/projects')->with('status' , 'Project Edit Successfuly !');

    }
    public function delete($id) {
        $project = Project::find($id);
        $project->delete();
        return redirect('/projects')->with('status' , 'Project Deleted Successfuly !');
    }
}
