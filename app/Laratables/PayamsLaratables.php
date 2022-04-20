<?php

namespace App\Laratables;

use App\Models\Regions\State;
use Illuminate\Support\Facades\Log;

class PayamsLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('name');
    }

    public static function laratablesCountyRelationQuery()
    {
        return function ($query) {
            $query->with('state');
        };
    }

    public static function laratablesAdditionalColumns()
    {
        return ['slug', 'county_id'];
    }

    public static function laratablesCustomState($payam)
    {
        return $payam->county->state->name;
    }
    
    public static function laratablesCustomAction($payam)
    {
        return view('dashboard.regions.payams.index_action',['payam'=>$payam])->render();
    }
}