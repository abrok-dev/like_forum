<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\Request;

use App\Models\User;
use App\Repository\MessageRepository;
use App\Repository\ThreadRepository;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    //
    private MessageRepository $messageRepository;
    private ThreadRepository $threadRepository;

    public function __construct()
    {
        $this->messageRepository = new MessageRepository();
        $this->threadRepository = new ThreadRepository();
    }
    public function profile(string $slug)
    {
        $user = User::find(
            DB::table('users')
            ->where('slug','=',$slug)
            ->select('id')->get);
        return view('user.profile',['user'=>$user , 
      'lastMessages'=>  $this->messageRepository->findLastMessageByUser($user , 5),
      'lastThreads'=> $this->threadRepository->findLastThreadsByUser($user , 5)
        ]);
    }

    public function threads(Request $request , string $slug)
    {
        $user = User::find(
            DB::table('users')
            ->where('slug','=',$slug)
            ->select('id')->get);
            $page = $request->get('page',1);

            $paginate = $user->threads->forPage($page , 25);

            return view('user.threads' , ['user'=>$user , 'pagination' =>$paginate]);


    }

    public function messages(Request $request , string $slug )
    {
        $user = User::find(
            DB::table('users')
            ->where('slug','=',$slug)
            ->select('id')->get);
            $page = $request->get('page',1);

            $paginate = $user->messages->forPage($page , 25);

            return view('user.messages' , ['user'=>$user , 'pagination' =>$paginate]);


    }
}
