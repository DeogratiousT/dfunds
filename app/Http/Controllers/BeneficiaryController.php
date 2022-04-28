<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Beneficiary;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Support\Facades\Storage;
use App\Laratables\BeneficiariesLaratables;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->ajax()) {
            return Laratables::recordsOf(Beneficiary::class, BeneficiariesLaratables::class);
        }

        return view('dashboard.beneficiaries.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        return view('dashboard.beneficiaries.create', ['projects' => $projects]);
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
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'age' => 'required|integer',
            'mobile_number' => 'required|string',
            'national_id' => 'required|string',
            'token_number' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
            'featured_image' => 'required|image',
            'payment_status' => 'required'
        ]);

        $beneficiary = new Beneficiary;

        //Handle File upload
        if($request->featured_image){
            //Get File Name with the Extension
            $filenameWithExt = $request->featured_image->getClientOriginalName();
            //Get just File name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->featured_image->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.Str::random('5').'.'.$extension;
            //Upload Image
            Storage::disk('public')->putFileAs('beneficiaries', $request->featured_image, $fileNameToStore);

            $beneficiary->featured_image = $fileNameToStore;

        }
        
        $beneficiary->internal_id = Str::upper(Str::random(5));
        $beneficiary->first_name = $request->first_name;
        $beneficiary->middle_name = isset($request->middle_name) ? $request->middle_name : null;
        $beneficiary->last_name = isset($request->last_name) ? $request->last_name : null;
        $beneficiary->age = $request->age;
        $beneficiary->mobile_number = $request->mobile_number;
        $beneficiary->national_id = $request->national_id;
        $beneficiary->token_number = $request->token_number;
        $beneficiary->project_id =$request->project_id;
        $beneficiary->amount = $request->amount;
        $beneficiary->payment_status = $request->payment_status;
        $beneficiary->save();

        return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiary $beneficiary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiary $beneficiary)
    {
        $projects = Project::all();
        return view('dashboard.beneficiaries.edit', ['projects' => $projects, 'beneficiary'=>$beneficiary]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiary $beneficiary)
    {
        $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'age' => 'required|integer',
            'mobile_number' => 'required|string',
            'national_id' => 'required|string',
            'token_number' => 'required|string',
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
            'featured_image' => 'nullable|image',
            'payment_status' => 'required'
        ]);

        //Handle File upload
        if($request->featured_image){
            //Get File Name with the Extension
            $filenameWithExt = $request->featured_image->getClientOriginalName();
            //Get just File name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //Get just Ext
            $extension = $request->featured_image->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $filename.'_'.Str::random('5').'.'.$extension;
            //Upload Image
            Storage::disk('public')->putFileAs('beneficiaries', $request->featured_image, $fileNameToStore);

            $beneficiary->featured_image = $fileNameToStore;

        }
        
        $beneficiary->first_name = $request->first_name;
        $beneficiary->middle_name = isset($request->middle_name) ? $request->middle_name : null;
        $beneficiary->last_name = isset($request->last_name) ? $request->last_name : null;
        $beneficiary->age = $request->age;
        $beneficiary->mobile_number = $request->mobile_number;
        $beneficiary->national_id = $request->national_id;
        $beneficiary->token_number = $request->token_number;
        $beneficiary->project_id =$request->project_id;
        $beneficiary->amount = $request->amount;
        $beneficiary->payment_status = $request->payment_status;
        $beneficiary->save();

        return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiary $beneficiary)
    {
        $beneficiary->delete();
        return redirect()->route('beneficiaries.index')->with('success', 'Beneficiary Deleted Successfully');
    }
}
