<?php

namespace App\Laratables;

class ProjectsLaratables
{
    public static function laratableQueryConditions($query)
    {
        return $query->orderBy('name');
    }

    public static function laratablesAdditionalColumns()
    {
        return ['slug', 'description'];
    }
    
    public static function laratablesCustomAction($project)
    {
        return view('dashboard.projects.index_action',['project'=>$project])->render();
    }
}