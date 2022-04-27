<?php

namespace App\Models;

use App\Models\Project;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Beneficiary extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['internal_id', 'first_name', 'middle_name', 'last_name', 'age', 'mobile_number', 'national_id', 'token_number', 'project_id', 'amount', 'featured_image', 'payment_status'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('internal_id')
            ->saveSlugsTo('slug');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
