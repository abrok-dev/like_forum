<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function threads()
    {
        return $this->hasMany(Thread::class , 'author_id');
    }

    public function messages()
    {
        return $this->hasMany(Message::class , 'author_id');
    }

    protected $cast = [
        'roles' => 'array'
    ];
    public function messagesUpdated()
    {
        return $this->hasMany(Message::class , 'UpdatedByUser_id');
    }


    public function likes()
    {
        return $this->hasMany(MessageLike::class , 'user_id');
    }

    public function reported()
    {
        return $this->hasMany(Report::class, 'reportedByUser_id');
    }

    public function treated()
    {
        return $this->hasMany(Report::class , 'treatedByUser_id');
    }


    
}
