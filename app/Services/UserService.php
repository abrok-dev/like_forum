<?php
namespace App\Services;

use App\Models\User;

class UserService
{

    private ThreadService $threadService;
    private MessageService $messageService ;
    private ReportService $reportService;
    public function __construct(
    )
    {
        $this->threadService = new ThreadService();
        $this->messageService = new MessageService();
        $this->reportService = new ReportService();
    }

    public function deleteUser(User $user , bool $deleteContent = false)
    {
        $deleteContent ? $this->resetUser($user):
        $this->setContentNullByUser($user);
        $reports = $user->treated;
        foreach($reports as $report)
        {
            $report->treatedByUser_id = null;
            $report->save();
        }

        $messages = $user->messagesUpdated;
        foreach($messages as $message)
        {
            $message->updatedByUser_id = null;
            $message->save();
            
        }
    }

    public function resetUser(User $user)
    {
        $threads = $user->threads;
        foreach($threads as $thread)
        {
            $thread->delete();
            
        }
       $messages = $user->messages;
        foreach($messages as $message)
        {
            $message->delete();
        }
        $reports = $user->reports;
        foreach($reports as $report)
        {
            $report->delete();
        }

    }

    public function setContentNullByUser(User $user)
    {
        $threads = $user->threads;
        foreach($threads as $thread)
        {
            $thread->author_id = null;
            $thread->save();
        }
       $messages = $user->messages;
        foreach($messages as $message)
        {
            $message->author_id = null;
            $message->save();
        }
        $reports = $user->reports;
        foreach($reports as $report)
        {
            $report->reportedByUser_id = null;
            $report->treatedByUser_id = null;
            
            $report->save();
        }
    }
}


?>