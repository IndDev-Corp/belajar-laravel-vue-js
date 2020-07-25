<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NominalQurban extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_nominal',
        'nominal_qurban',
        'status'
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nominal_qurban';
}
