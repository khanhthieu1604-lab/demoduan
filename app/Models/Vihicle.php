<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
// use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;

class Vihicle extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'vihicles';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $hidden = [];
    // protected $dates = [];

    protected $fillable = [
        'vihicle_name',
        'vihicle_price',
        // 'image',
        'vihicle_images',
        'license_plate',
        'number_chair',
        'size',
        'engine',
        'cylinder_capacity',
        'maximum_power',
        'maximum_torque',
        'gearbox',
        'color',
        'weight',
        'year_manufacture',
        'register_time',
        'vihicle_status',
        'company_id',
        'brand_id',
    ];

    protected $casts = [
        'vihicle_images' => 'array',
    ];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = "vihicle";
        $destination_path = "uploads/vihicle/indeximage";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function setImagesAttribute($value)
    {
        $attribute_name = 'images';
        $disk = 'vihicle'; // doi lai de customize
        $destination_path = "uploads/vihicle/detailimage"; //tao folder uploads

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            if (count((array)$obj->images)) {
                foreach ($obj->images as $file_path) {
                    \Storage::disk('vihicle')->delete($file_path);
                }
            }
            if ($obj->image) {
                \Storage::disk('vihicle')->delete($obj->image);
            }
        });
    }

    public function brand()
    {
        return $this->belongsTo(\App\Models\Brand::class);
    }

    public function contract()
    {
        return $this->hasMany(\App\Models\Contract::class);
    }

    public function service()
    {
        return $this->hasMany(\App\Models\Service::class);
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }

    public function customer()
    {
        return $this->belongsTo(\App\Models\Customer::class);
    }
}
