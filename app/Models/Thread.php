<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class );
    }

    public function forum()
    {
        return $this->belongsTo(Forum::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class );
    }

}
