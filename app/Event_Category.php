<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event_Category extends Model
{
    use SoftDeletes;
    protected $table = "event_category";
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'category_name',
        'id_rt',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
