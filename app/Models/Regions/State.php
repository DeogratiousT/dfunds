<?php

namespace App\Models\Regions;

use App\Models\Regions\Payam;
use Spatie\Sluggable\HasSlug;
use App\Models\Regions\County;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class State extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug'];

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

    public function counties()
    {
        return $this->hasMany(County::class);
    }

    public function payams()
    {
        return $this->hasManythrough(Payam::class, County::class);
    }
}
