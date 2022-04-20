<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regions\Payam;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Laratables\PayamsLaratables;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Validator;

class PayamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Payam::class, PayamsLaratables::class);
        }

        return view('dashboard.regions.payams.index');
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
            'name' => 'required|unique:payams,name|string',
            'state_id' => 'required|exists:states,id|integer',
            'county_id' => 'required|exists:counties,id|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->safe();

        Payam::create([
            'name' => $validated['name'],
            'county_id' => $validated['county_id']
        ]);

        $request->session()->flash('success', 'PAYAM Created Successfully');

        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Regions\Payam  $payam
     * @return \Illuminate\Http\Response
     */
    public function show(Payam $payam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Regions\Payam  $payam
     * @return \Illuminate\Http\Response
     */
    public function edit(Payam $payam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Regions\Payam  $payam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payam = Payam::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'state_id' => 'required|exists:states,id|integer',
            'county_id' => 'required|exists:counties,id|integer',
        ]);
        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $validated = $validator->safe();

        $payam->name = $validated['name'];
        $payam->county_id = $validated['county_id'];
        $payam->save();

        $request->session()->flash('success', 'PAYAM Updated Successfully');

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Regions\Payam  $payam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payam $payam)
    {
        $payam->delete();

        return redirect()->route('payams.index')->with('success','Payam Deleted Successfully');
    }
}
