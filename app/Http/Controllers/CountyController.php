<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions\State;
use App\Models\Regions\County;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Laratables\CountiesLaratables;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;

class CountyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(County::class, CountiesLaratables::class);
        }

        return view('dashboard.regions.counties.index');
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
            'name' => 'required|unique:counties,name|string',
            'state_id' => 'required|exists:states,id|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->safe();

        try {
            County::create([
                'name' => $validated['name'],
                'state_id' => $validated['state_id']
            ]);
    
            $request->session()->flash('success', 'County Created Successfully');
    
            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Create Failed. Please try again later");

            abort(500);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regions\County  $county
     * @return \Illuminate\Http\Response
     */
    public function show(County $county)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regions\County  $county
     * @return \Illuminate\Http\Response
     */
    public function edit(County $county)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regions\County  $county
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $county = County::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'state_id' => 'required|exists:states,id|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->safe();

        try {
            $county->name = $validated['name'];
            $county->state_id = $validated['state_id'];
            $county->save();

            $request->session()->flash('success', 'County Updated Successfully');

            return response()->json(['success' => true]);
        } catch (\Throwable $th) {
            $request->session()->flash('error', "Update Failed. Please try again later");

            abort(500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regions\County  $county
     * @return \Illuminate\Http\Response
     */
    public function destroy(County $county)
    {
        $county->delete();

        return redirect()->route('counties.index')->with('success','County Deleted Successfully');
    }
}
