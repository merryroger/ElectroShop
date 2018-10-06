<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $guarded = [];

    //public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
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
