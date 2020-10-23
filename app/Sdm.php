<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sdm extends Model
{
    use SoftDeletes;
    protected $table = "sdm";
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sdm_fullname',
        'sdm_no_ktp',
        'sdm_phone',
        'sdm_join_date',
        'sdm_rt',
        'sdm_category',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
