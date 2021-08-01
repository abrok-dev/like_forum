<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //

    public function index()
    {
        return redirect()->route('forum.index');
    }

    public function members(Request $request)
    {
        $page = $request->get('page',1);
        $users = User::all();
        $paginate = $users->forPage($page , 25);
        return view('pages.members',['pagination'=>$paginate]);
    }

    public function team()
    {
        $userRepo = new UserRepository();
        return view('pages.team',[
            'moderators ' =>$userRepo->findByRole('ROLE_MODERATOR')
        ]);
    }
}
