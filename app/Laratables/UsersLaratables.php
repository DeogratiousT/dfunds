<?php

namespace App\Laratables;

class UsersLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('created_at','desc')->with('roles');
    }

    public static function laratablesAdditionalColumns()
    {
        return ['active'];
}

    public static function laratablesCustomStatus($user)
    {
        return view('dashboard.users.index_state',['user'=>$user])->render();
    }

    public static function laratablesCustomRole($user)
    {
        return view('dashboard.users.index_role',['user'=>$user])->render();
    }
    
    public static function laratablesCustomAction($user)
    {
        return view('dashboard.users.index_action',['user'=>$user])->render();
    }
}