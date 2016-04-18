<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
	use SoftDeletes;

    /**
     * The attributes that are mass-assignable
     *
     * @var array [<description>]
     */
    protected $fillable = ['name'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get all of the stops for the area.
     */
    public function stops()
    {
        return $this->hasMany(Stop::class);
    }
}
