<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warga extends Model
{
    use SoftDeletes;
    protected $table = "warga";
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'warga_no_ktp',
        'warga_no_kk',
        'warga_first_name',
        'warga_last_name',
        'warga_sex',
        'warga_religion',
        'warga_address',
        'warga_address_code',
        'warga_job',
        'warga_salary_range',
        'warga_phone',
        'warga_email',
        'warga_birth_date',
        'warga_is_ktp_sama_domisili',
        'warga_join_date',
        'warga_pendidikan',
        'warga_rt',
        'warga_status',
        'warga_meninggal_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
