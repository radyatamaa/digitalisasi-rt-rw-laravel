<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sdm_Category extends Model
{
    use SoftDeletes;
    protected $table = "sdm_category";
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_rt',
        'category_name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
