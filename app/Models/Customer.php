<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'customers';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = [
        'address',
        'phone_number',
        'driver_license',
        'id_card',
        'passport',
        'customer_status',
        'user_id',
        'vihicle_id',
        'images',
        'id_image_f',
        'id_image_b'
    ];

    // public function setImageAttribute1($value)
    // {
    //     $attribute_name = "images";
    //     $disk = "customer";
    //     $destination_path = "userimages";

    //     // $this->uploadFileToDiskNew($value, $attribute_name, $disk, $destination_path);
    //     if ($value == null) {
    //         \Storage::disk($disk)->delete($this->{$attribute_name});

    //         $this->images[$attribute_name] = null;
    //     }

    //     if (Str::startsWith($value, 'data:images')) {
    //         $images = \Image::make($value)->encode('jpg', 90);

    //         $filename = md5($value . time()) . '.jpg';

    //         \Storage::disk($disk)->put($destination_path . '/' . $filename, $images->stream());

    //         \Storage::disk($disk)->delete($this->{$attribute_name});

    //         $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
    //         $this->images[$attribute_name] = $public_destination_path . '/' . $filename;
    //     }
    // }

    // public function setImageAttribute2($value)
    // {
    //     $attribute_name = "id_image_f";
    //     $disk = "customer";
    //     $destination_path = "idimages";

    //     $this->uploadFileToDiskNew($value, $attribute_name, $disk, $destination_path);
    // }

    // public function setImageAttribute3($value)
    // {
    //     $attribute_name = "id_image_b";
    //     $disk = "customer";
    //     $destination_path = "idimages";

    //     $this->uploadFileToDiskNew($value, $attribute_name, $disk, $destination_path);
    // }

    // public static function boot()
    // {
    //     parent::boot();
    //     static::deleting(function ($obj) {
    //         if ($obj->images) {
    //             \Storage::disk('customer')->delete($obj->images);
    //         }
    //         if ($obj->id_image_f) {
    //             \Storage::disk('customer')->delete($obj->id_image_f);
    //         }
    //         if ($obj->id_image_b) {
    //             \Storage::disk('customer')->delete($obj->image_b);
    //         }
    //     });
    // }

    protected $hidden = [
        'password', 'remember_token',
    ];
    // protected $dates = [];

    public function contract()
    {
        return $this->hasOne(\App\Models\Contract::class);
    }

    public function vihicle()
    {
        return $this->hasOne(\App\Models\Vihicle::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function company()
    {
        return $this->belongsTo(\App\Models\Company::class);
    }
}
