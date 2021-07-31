<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    public function MessageLikes()
    {
        return $this->hasMany(MessageLike::class );
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function thread()
    {
        return $this->belongsTo(Thread::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function updatedByUser()
    {
        return $this->belongsTo(User::class);
    }
    
}
