<?php

namespace App\Laratables;

use App\Models\Regions\State;
use Illuminate\Support\Facades\Log;

class CountiesLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('name');
    }

    public static function laratablesAdditionalColumns()
    {
        return ['slug'];
    }
    
    public static function laratablesCustomAction($county)
    {
        return view('dashboard.regions.counties.index_action',['county'=>$county])->render();
    }
}