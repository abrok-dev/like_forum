<?php

namespace App\Services;


use App\Models\User;
use App\Repository\MessageRepository;
use App\Repository\ThreadRepository;
use DateTime;

class AntispamService
{
    private const DELAY_MESSAGE = 60;

    private const DELAY_THREAD = 90;

    public function __construct(private ThreadRepository
     $threadRepository , 
     private MessageRepository $messageRepository)
    {
        
    }
    
    public function canPostThread(User $user)
    {
        $lastThread = $this->threadRepository->findLastThreadsByUser($user);
        if(!$lastThread->contains('id') && !json_decode(($user->roles))['ROLE_MODERATOR'])
        {
            $currentDate = new DateTime();
            return $currentDate->modify(sprintf('-%s seconds', self::DELAY_THREAD))> $lastThread->createdAt();
        }

return true;
        
    }

    public function canPostMessage(User $user)
    {
        $lastMessage = $this->messageRepository->findLastMessageByUser($user);
        if(!$lastMessage->contains('id') && !json_decode(($user->roles))['ROLE_MODERATOR'])
        {
            $currentDate = new DateTime();
            return $currentDate->modify(sprintf('-%s seconds', self::DELAY_MESSAGE))> $lastMessage->createdAt();
        }

        return true;
        
    }

}


?>