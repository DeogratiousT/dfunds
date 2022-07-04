<?php

namespace App\Laratables;

class UsersLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->with('roles')->orderBy('name');
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