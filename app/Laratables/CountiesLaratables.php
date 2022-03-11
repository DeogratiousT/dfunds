<?php

namespace App\Laratables;

class StatesLaratables
{
    public static function laratablesAdditionalColumns()
    {
        return ['slug'];
    }
    
    public static function laratablesCustomAction($state)
    {
        return view('dashboard.regions.states.index_action',['state'=>$state])->render();
    }
}