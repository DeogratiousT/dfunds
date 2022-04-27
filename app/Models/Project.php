<?php

namespace App\Models;

use App\Models\Partner;
use App\Models\Regions\Payam;
use App\Models\Regions\State;
use Spatie\Sluggable\HasSlug;
use App\Models\Regions\County;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, HasSlug;

    protected $fillable = ['name', 'slug', 'description', 'start_date', 'end_date', 'partner_id', 'state_id', 'county_id', 'payam_id', 'payment_type', 'status'];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

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

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function payam()
    {
        return $this->belongsTo(Payam::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
