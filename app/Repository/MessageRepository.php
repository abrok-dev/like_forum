<?php
namespace App\Repository;

use App\Models\Forum;
use App\Models\User as User;
use App\Models\Category as Category;
use App\Models\Thread;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB as DB;
class MessageRepository
{
    public function findLastMessageByUser(User $user , int $limit=1)
    {
       return DB::table('messages')
        ->where('author_id' , '=' , $user->id)
        ->orderByDesc('created_at')
        ->select('*')
        ->limit($limit)->get();
    } 

    public function findMessagesByThread(Thread $thread , bool $onlyId=false)
    {
     return   DB::table('messages')
        ->join('message_likes', function (JoinClause $join )use ($thread){
            $join->on('message_id' ,'=' , 'messages.id')
            ->where('thread_id' , '=' , $thread->id);
        })
        ->select('*')
        ->orderBy('messages.created_at' , 'asc')
        ->get();
    }

    public function findLastMessagebyThread(Thread $thread)
    {
       return DB::table('messages')
        ->where('thread_id' ,'=', $thread->id)
        ->select('*')
        ->orderByDesc('created_at')
        ->limit(1)
        ->get();
    }

}

?>