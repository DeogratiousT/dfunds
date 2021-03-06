<?php

namespace App\Models\Regions;

use App\Models\Regions\Payam;
use App\Models\Regions\State;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class County extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'state_id'];

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

    /**
     * County - State Relationship
     * @return belongsTo 
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function payams()
    {
        return $this->hasMany(Payam::class);
    }
}
