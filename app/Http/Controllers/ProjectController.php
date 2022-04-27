<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Regions\State;
use App\Models\Regions\County;
use App\Http\Controllers\Controller;
use App\Laratables\ProjectsLaratables;
use Freshbitsweb\Laratables\Laratables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Project::class, ProjectsLaratables::class);
        }

        return view('dashboard.projects.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partners = Partner::all();
        $states = State::with(['counties', 'counties.payams'])->get();
        $counties = County::with(['payams'])->get();
        return view('dashboard.projects.create', ['partners' => $partners, 'states' => $states, 'counties'=>$counties]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'partner_id' => 'required|exists:partners,id',
            'state_id' => 'required|exists:states,id',
            'county_id' => 'required|exists:counties,id',
            'payam_id' => 'required|exists:payams,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'payment_type' => 'required',
            'status' => 'required',
        ]);

        Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'partner_id' => $request->partner_id,
            'state_id' => $request->state_id,
            'county_id' => $request->county_id,
            'payam_id' => $request->payam_id,
            'start_date' => $request->start_date,
            'end_date' =>$request->end_date,
            'payment_type' => $request->payment_type,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $partners = Partner::all();
        $states = State::with(['counties', 'counties.payams'])->get();
        $counties = County::with(['payams'])->get();
        return view('dashboard.projects.edit', ['partners' => $partners, 'states' => $states, 'counties'=>$counties, 'project'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'partner_id' => 'required|exists:partners,id',
            'state_id' => 'required|exists:states,id',
            'county_id' => 'required|exists:counties,id',
            'payam_id' => 'required|exists:payams,id',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'payment_type' => 'required',
            'status' => 'required',
        ]);

        $project->update([
            'name' => $request->name,
            'description' => $request->description,
            'partner_id' => $request->partner_id,
            'state_id' => $request->state_id,
            'county_id' => $request->county_id,
            'payam_id' => $request->payam_id,
            'start_date' => $request->start_date,
            'end_date' =>$request->end_date,
            'payment_type' => $request->payment_type,
            'status' => $request->status,
        ]);

        return redirect()->route('projects.index')->with('success', 'Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('projects.index')->with('success', 'Project Deleted Successfully');
    }
}
