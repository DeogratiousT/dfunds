<?php

namespace App\Models\Regions;

use Spatie\Sluggable\HasSlug;
use App\Models\Regions\County;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payam extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'county_id'];

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
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

    public function county()
    {
        return $this->belongsTo(County::class);
    }
}
