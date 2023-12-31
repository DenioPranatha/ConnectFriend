<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedDetail extends Model
{
    use HasFactory;

    public function LikedHeader(){
        return $this->belongsTo(LikedHeader::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
