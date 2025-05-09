<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\MarkController;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'expiration_date', 'quantity', 'mark_id'];

   
public function mark()
{
    return $this->belongsTo(Mark::class);
}

}