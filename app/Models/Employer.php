<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'employees';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'images',
        'user_id',
        'company_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company() {
        // return $this->belongsToMany(\App\Models\Company::class);
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function user() {
        return $this->belongsTo(\App\User::class);
    }
    
}
