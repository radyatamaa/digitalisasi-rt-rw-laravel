<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event_Detail extends Model
{
    use SoftDeletes;
    protected $table = "event_detail";
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'event_warga',
        'event_rt',
        'event_result',
        'event_date',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_active',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
