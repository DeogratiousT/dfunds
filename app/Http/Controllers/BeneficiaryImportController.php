<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BeneficiaryImport;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Validators\ValidationException;

class BeneficiaryImportController extends Controller
{
    public function importXlsx(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        try {
            Log::info('here try');
            Excel::import(new BeneficiaryImport, $request->file('file')->store('temp'));
            Log::info('here done');
            
            $request->session()->flash('success', 'Import Successful');
            return response()->json(['success' => true]);

        } catch (ValidationException $e) {
            Log::info('here failed');

            $failures = $e->failures();
     
            foreach ($failures as $failure) {
                $reason = 'UPLOAD FAILED!! ' . $failure->attribute() . ' on row no. ' . $failure->row() . ' is invalid';
                $request->session()->flash('error', $reason);

                abort(500);
            }
        }    
    }
}
