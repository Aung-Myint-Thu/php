<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Article extends Model
{
    use HasFactory;

    public function category(){
        return $this->belongsTo("\App\Models\Category");
    }
    public function comments(){
        return $this->hasmany("\App\Models\Comment");
    }
    public function user(){
        return $this->belongsTo("App\Models\User");
    }
}
