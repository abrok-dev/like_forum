<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\Thread;
use App\Repository\MessageRepository;
use App\Services\MessageService;
use App\Services\ThreadService;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    //

    public function show(int $id)
    {
        $message = Message::find($id);
        $threadService = new ThreadService();
        return redirect()->route('thread.show', [
            'slug'=> $message ,
            'page' => $threadService->getMessagePage($message),
        
        ]);
    }

    public function edit(int $id)
    {

    }

    public function delete(int $id)
    {
        $message = Message::find($id);
        $thread = $message->thread;
        $forum = $thread->forum;
        $messageService = new MessageService();
        if(!$messageService->canDeleteMessage($message))
        {
            return redirect()->route('thread.show' , ['slug'=>$thread->slug]);
        }

        $messageService->deleteMessage($message);
        return redirect()->route('thread.show',['slug' => $thread->slug]);
    }
    
}
