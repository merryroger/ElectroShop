<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    protected $guarded = [];
    //public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function removeImage()
    {
        Storage::disk('public')->delete($this->image);
    }

    public function delete()
    {
        $this->removeImage();
        return parent::delete();
    }

}
