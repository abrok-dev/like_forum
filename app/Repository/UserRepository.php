<?php
namespace App\Repository;

use Illuminate\Support\Facades\DB;
class UserRepository
{
    public function findOnlineUsers()
    {
      return  DB::table('users')
        ->where('lastActivityAt' , '>', time()-600 )
        ->select('*')
        ->get();
    }

    public function countOnlineUsers()
    {
      return  DB::table('users')
        ->where('lastActivityAt' , '>', time()-600 )
        ->count();
    } 
    
    public function findLastRegistered()
    {
     return   DB::table('users')
        ->orderByDesc('createdAt')
        ->limit(1)
        ->select('*')
        ->get();
    }
    public function findByRole(string $role)
    {
        return DB::table('users')
        ->where('roles->ROLE_MODERATOR' ,'=' ,true)
        ->get();
    }

}

?>