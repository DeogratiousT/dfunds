<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions\State;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Laratables\StatesLaratables;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(State::class, StatesLaratables::class);
        }
        
        return view('dashboard.regions.states.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:states,name|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->safe();

        try {
            State::create([
                'name' => $validated['name']
            ]);
    
            $request->session()->flash('success', 'State Created Successfully');
    
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Create Failed. Please try again later");

            abort(500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regions\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regions\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regions\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $state = State::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->safe();

        try {
            $state->name = $validated['name'];
            $state->save();

            $request->session()->flash('success', 'State Updated Successfully');

            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Update Failed. Please try again later");

            abort(500);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regions\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')->with('success','State Deleted Successfully');
    }
}
