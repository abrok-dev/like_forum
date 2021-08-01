<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Repository\MessageLikeRepository;
use App\Services\MessageLikeService;
use App\Models\MessageLike;
use Illuminate\Http\Response;
class MessageLikeController extends Controller
{
    //

    public function like(int $id)
    {
        $message= Message::find($id);
        $likeService = new MessageLikeService();
        $likeService->likeMessage($message);
        return json_encode(['likes'=> $message->likes->count()]);
    }
}
