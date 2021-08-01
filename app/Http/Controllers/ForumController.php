<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use App\Models\Message;
use App\Models\Thread;
use App\Repository\MessageRepository;
use App\Repository\ThreadRepository;
use App\Models\User;
use App\Repository\CategoryRepository;
use App\Repository\ForumRepository;
use App\Repository\UserRepository;
use App\Services\ForumService;
use Illuminate\Http\Response;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route as FacadesRoute;

class ForumController extends Controller
{
    //



    public function index()
    {
        $categoryRepo = new CategoryRepository();
        $userRepository = new UserRepository();
        
        return view('pages.forums',['categories' => $categoryRepo->findAllCategories()
        , 'onlineUsers'=>$userRepository->findOnlineUsers(),
        'totalUsers'=>User::all()->count(),
        'lastRegistered'=> $userRepository->findLastRegistered(),
        'totalMessage'=>Message::all()->count(),
        'totalThreads'=> Thread::all()->count()
    ]);
    }


    public function show (Request $request, string $slug)
    {
        
        $forum = Forum::find(
            DB::table('forums')
            ->where('slug','=',$slug)
            ->select('id')->get() );
        $threadRepository = new ThreadRepository();
        $page = $request->get('page',1);
        $threads= $threadRepository->findThreadsByForum($forum);
        $paginate = $threads->forPage($page , 15);
        return view('forum.show' , ['forum'=> $forum ,
        'pagination'=>$paginate]);
    }

    public function category(string $slug)
    {
        $category = Category::find(
            DB::table('caterory')
            ->where('slug','=',$slug)
            ->select('id')->get());
        $forumRepos = new ForumRepository();
        return view('forum.category',[
            'category' =>  $category,
                'forums'=> $forumRepos->findForumsByCategory($category)
        ]);
    }

    public function lock(Request $request, int $id )
    {
        $forumService = new ForumService();
        $forum = Forum::find($id);
        $forum->lock = true;
        $forum->save();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'forum' , 'message' => 'abrakad']);
        return redirect()->route('forum.show' , ['slug'=>$forum->slug()]);
       }
    public function unlock(Request $request,int $id)
    {
        $forumService = new ForumService();
        $forum = Forum::find($id);
        $forum->lock = false;
        $forum->save();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'forum' , 'message' => 'abrakad']);
        return redirect()->route('forum.show' , ['slug'=>$forum->slug()]);
    }
}
