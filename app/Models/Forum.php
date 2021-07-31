<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongTo(Category::class);
    }
  
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
