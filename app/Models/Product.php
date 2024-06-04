<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category() :BelongsTo {
        return $this->belongsTo(Category::class);
    }


    public function getImage() {
        return asset('storage/products/'.$this->image);
    }

    public function inStock() {
        if($this->qty > 0) {
            return true;
        }else {
            return true;
        }
    }

}
