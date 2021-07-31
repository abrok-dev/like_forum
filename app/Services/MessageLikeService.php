<?php

    namespace App\Services;

use App\Models\Message;
use App\Models\MessageLike;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class MessageLikeService
{

public function __construct()
{
    
}

    public function likeMessage(Message $message)
    {

        if(Auth::check()){
        $likes = User::find(Auth::id())->likes;
        foreach($likes as $like)
        {
            if($like->message->id == $message->id)
            {
                return true;
            }
        }
    
        $messLike = new MessageLike;
        $messLike->message_id = $message->id;
        $messLike->user_id = Auth::id();
        $messLike->save();
        return true;
    }else return false;
}

}

?>