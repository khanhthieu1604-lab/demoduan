<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class Company extends Model
{
    use CrudTrait;

    protected $table = 'companies';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = [
        'company_name',
        'image',
        'images',
        'address_number',
        'address_ward',
        'address_district',
        'address_city',
        'address_country',
        'tax_code',
        'phone_number',
        'hotline',
        'fax',
        'email',
        'company_status',

    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = 'company';
        $destination_path = "uploads/company";

        $this->uploadFileToDisk($value, $attribute_name, $disk, $destination_path);

        // return $this->attributes[{$attribute_name}]; // uncomment if this is a translatable field
    }

    public function setImagesAttribute($value)
    {
        $attribute_name = 'images';
        $disk = 'company'; // doi lai de customize
        $destination_path = "uploads/company"; //tao folder uploads

        $this->uploadMultipleFilesToDisk($value, $attribute_name, $disk, $destination_path);
    }

    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            if (count((array)$obj->images)) {
                foreach ($obj->images as $file_path) {
                    \Storage::disk('company')->delete($file_path);
                }
            }
            if ($obj->image) {
                \Storage::disk('company')->delete($obj->image);
            }
        });
    }

    public function employer()
    {
        return $this->hasMany(\App\Models\Employer::class);
    }

    public function contract()
    {
        return $this->belongsToMany(\App\Models\Contract::class);
    }

    public function customer()
    {
        return $this->belongsToMany(\App\Models\Customer::class);
    }

    public function user()
    {
        return $this->hasMany(\App\User::class);
    }

    public function vihicle()
    {
        return $this->hasMany(\App\Models\Vihicle::class);
    }
}
