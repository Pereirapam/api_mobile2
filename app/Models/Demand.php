<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    use HasFactory;

    protected $fillable = ['type', 'arrival_date', 'cycle', 'mark_id'];

   
    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }
}
