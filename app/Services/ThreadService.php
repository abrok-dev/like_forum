<?php

namespace App\Services;

use App\Models\Forum;
use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use App\Repository\MessageRepository;

class ThreadService
{
    private AntispamService $antispamService;
    private MessageRepository $messageRepository;
    public function __construct()
    {
        $this->antispamService = new AntispamService();
        $this->messageRepository = new MessageRepository();
    }

    public function canPostThread(Forum $forum , User $user)
    {
        if($forum->isLock)
        {
            return false;
        }

        if(!$this->antispamService->canPostThread($user))
        {
            return false;
        }
        return true;

    }


    public function createThread(string $title , Forum $forum , User $user
    ,bool $lock =false,bool $pin = false)
    {
        $thread = new Thread();
        $thread->title = $title;
        $thread->author_id = $user->id;
        $thread->forum_id = $forum->id;
        $thread->slug = $title;
        $thread->isLock = $lock;
        $thread->isPin = $pin;
        $thread->save();
        return $thread;
    }

    public function deleteThread(Thread $thread)
    {
      $thread->delete();  
    }

    public function getMessagePage(Message $message)
    {
        $messages = $message->thread->messages;
        $key = $messages->search($message);
        return (int) (ceil(((int) $key + 1) / 10));
    }

}

?>