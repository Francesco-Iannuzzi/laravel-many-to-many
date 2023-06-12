<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Auth::user()->projects()->orderByDesc('id')->paginate(5);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderByDesc('id')->get();

        $technologies = Technology::orderByDesc('id')->get();

        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data = $request->validated();
        
        $slug = Project::generateSlug($val_data['title']);
        
        $val_data['slug'] = $slug;

        $val_data['user_id'] = Auth::id();

        if ($request->hasFile('cover')) {
            
            $img_path = Storage::put('uploads', $request->cover);

            $val_data['cover'] = $img_path;
        }

        $newProject = Project::create($val_data);

        if ($request->has('technologies')) {
            $newProject->technologies()->attach($request->technologies);
        }
        
        return to_route('admin.projects.index')->with('message', 'Project Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $technologies = Technology::orderByDesc('id')->get();
        //dd($technologies);
        return view('admin.projects.show', compact('project', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderByDesc('id')->get();

        $technologies = Technology::orderByDesc('id')->get();

        if (Auth::id() === $project->user_id) {
        
            return view('admin.projects.edit', compact('project', 'types', 'technologies'));
            
        }
        abort(403);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $val_data = $request->validated();
        
        $slug = Project::generateSlug($val_data['title']);
        
        $val_data['slug'] = $slug;

        if ($request->hasFile('cover')) {

            if ($project->cover) {
                Storage::delete($project->cover);
            }
            
            $img_path = Storage::put('uploads', $request->cover);

            $val_data['cover'] = $img_path;
        }

        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }

        return to_route('admin.projects.index')->with('message', 'Project Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {

        if ($project->cover) {
            Storage::delete($project->cover);
        }
        
        $project->delete();

        return to_route('admin.projects.index')->with('message', 'Project Deleted!');
    }
}