<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'services';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $fillable = [
        'service_name',
        'price',
        'time',
        'distance',
        'status',
    ];

    public function contract() {
        return $this->hasMany(\App\Models\Contract::class);
    }

    public function vihicle() {
        return $this->belongsTo(\App\Models\Vihicle::class);
    }
}
