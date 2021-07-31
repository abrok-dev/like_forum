<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;
class UserRepository
{
    public function findOnlineUsers()
    {
        DB::table('users')
        ->where('lastActivityAt' , '>', time()-600 )
        ->select('*')
        ->get();
    }

    public function countOnlineUsers()
    {
        DB::table('users')
        ->where('lastActivityAt' , '>', time()-600 )
        ->count();
    } 
    
    public function findLastRegistered()
    {
        DB::table('users')
        ->orderByDesc('createdAt')
        ->limit(1)
        ->select('*')
        ->get();
    }

}

?>