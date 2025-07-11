<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
    protected $fillable = ['markName'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

