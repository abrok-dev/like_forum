<?php

namespace App\Repository;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ThreadRepository
{

    public function findLastThreadsByUser(User $user , $limit=1)
    {
    return    DB::table('threads')
        ->where('author_id' ,'=' , $user->id)
        ->orderByDesc('created_at')
        ->limit($limit)
        ->select('*')
        ->get();
    }

    public function findThreadsByForum(Forum $forum )
    {
        return DB::table('threads')
        ->where('forum_id','=',$forum->id)
        ->orderByDesc('isPin')
        ->orderByDesc('created_at')
        ->select('*')
        ->get();
    }

}

?>