<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

class Contract extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'contracts';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'vihicle_id',
        'customer_id',
        'company_id',
        'pickup_location',
        'location_togo',
        'location_dropoff_vihicle',
        // 'pickup_date',
        // 'dropoff_date',
        'contract_status',
        'pickup_time',
        'dropoff_time',
        'driver_status',
    ];
    // protected $hidden = [];
    // protected $dates = [];

    public function vihicle()
    {
        return $this->belongsto(\App\Models\Vihicle::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }

    public function company()
    {
        return $this->belongsToMany(\App\Models\Company::class);
    }
}
