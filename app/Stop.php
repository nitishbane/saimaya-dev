<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Stop extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass-assignable
     *
     * @var array [<description>]
     */
    protected $fillable = ['name', 'full_address', 'description'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the area that owns the stop.
     */
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
