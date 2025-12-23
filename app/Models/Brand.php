<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */


    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];

    // protected $hidden = [];
    // protected $dates = [];

    protected $table = 'brands';

    protected $fillable = [
        'brand_name',
        'brand_status',
    ];

    public function vihicle()
    {
        // return $this->hasOne(\App\Models\Vihicle::class);
        // return $this->hasMany(\App\Models\Vihicle::class);
        return $this->hasMany('\App\Models\Vihicle');
    } //hasMany

    public function contract()
    {
        return $this->belongsToMany(\App\Models\Contract::class);
    }
}
