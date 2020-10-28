<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kabupaten extends Model
{
    // use SoftDeletes;
    protected $table = "kabupaten";

    protected $fillable = [
        'province_id',
        'name',

    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
