<?php

namespace App\Imports;

use App\Models\Beneficiary;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class BeneficiaryImport implements ToModel, WithHeadingRow, WithValidation, SkipsEmptyRows
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info('try save');
        return Beneficiary::create([
            'internal_id' => Str::upper(Str::random(5)),
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'age' => $row['age'],
            'mobile_number' => $row['mobile_number'],
            'national_id' => $row['national_id'],
            'token_number' => $row['token_number'],
            'project_id' => $row['project_id'],
            'amount' => $row['amount'],
            'payment_status' => $row['payment_status']
        ]);
    }

    public function rules(): array
    {
        return [
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'age' => 'required|integer',
            'mobile_number' => 'required',
            'national_id' => 'required',
            'token_number' => 'required',
            'project_id' => 'required|exists:projects,id',
            'amount' => 'required|numeric',
            'payment_status' => 'required'             
        ];
    }
}
