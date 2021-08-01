<?php
namespace App\Services;

use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use App\Repository\MessageRepository as MessageRepository ;
use Illuminate\Support\Facades\DB;

class MessageService
{


    /**
     * 
     * @param private \App\Repository\MessageRepository $messageRepostory
     * 
     * 
     * 
     *  */ 
    
  //  private MessageRepostory $messageRepostory;
    private AntispamService $antispamService ;
    public function __construct( )
    {
    //    $this->messageRepostory = new MessageRepository();
        $this->antispamService = new AntispamService();
    }

    public function canPostMessage(Thread $thread , User $user)
    {

        if($thread->isLock)
        {
            return false;
        }
        if(!$this->antispamService->canPostMessage($user)){
            return false;
        }

        return true;
    }

    public function canEditMessage(Message $message , User $user)
    {
        if(json_decode($user->roles)['ROLE_MODERATOR'] == true)
        {
            return true;
        }

        if($message->thread->isLock )
        {
            return false;
        }
        return true;

    }

    public function canDeleteMessage(Message $message )
    {
      //  $thread = $message->thread;

        return true;


    }


    public function createMessage(string $content , Thread $thread , User $user)
    {
        $message = new Message();
        $message->content = $content;
        $message->author_id = $user->id;
        $message->thread_id = $thread->id;
        $message->save();
        return $message;
    }
    
    public function deleteMessage(Message $message)
    {
        DB::table('messages')->where('id','=',$message->id)->delete();

    }
    public function deleteMessagesByUser(User $user)
    {
        DB::table('messages')->where('user_id','=',$user->id)->delete();
    }


    
}


?>