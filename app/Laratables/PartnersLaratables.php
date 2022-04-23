<?php

namespace App\Laratables;

class PartnersLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('name');
    }

    public static function laratablesAdditionalColumns()
    {
        return ['slug'];
    }
    
    public static function laratablesCustomAction($partner)
    {
        return view('dashboard.partners.index_action',['partner'=>$partner])->render();
    }
}