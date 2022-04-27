<?php

namespace App\Laratables;

class BeneficiariesLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('internal_id');
    }

    public static function laratablesFirstName($beneficiary)
    {
        return $beneficiary->first_name . ' ' . $beneficiary->middle_name . ' ' . $beneficiary->last_name;
    }
    
    public static function laratablesAdditionalColumns()
    {
        return ['slug', 'middle_name', 'last_name', 'age', 'project_id', 'amount', 'featured_image', 'payment_status'];
    }
    
    public static function laratablesCustomAction($beneficiary)
    {
        return view('dashboard.beneficiaries.index_action',['beneficiary'=>$beneficiary])->render();
    }
}