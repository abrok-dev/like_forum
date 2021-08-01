<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Forum;
use App\Models\Message;
use App\Models\Thread;
use App\Models\User;
use App\Repository\MessageRepository;
use App\Services\MessageService;
use App\Services\ThreadService;
use Illuminate\Http\Response;

class ThreadController extends Controller
{
    //

    public function show(string $slug)
    {

    }

    public function new()
    {

    }

    public function delete()
    {

    }

    public function lock(Request $request, int $id)
    {
        $thread = Thread::find($id);
        $thread->lock = true;
        $thread->save();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'thread' , 'message' => 'locked']);
    }
    public function unlock(Request $request, int $id)
    {
        $thread = Thread::find($id);
        $thread->lock = false;
        $thread->save();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'thread' , 'message' => 'unlocked']);
    }

    public function pin(Request $request, int $id)
    {
        $thread = Thread::find($id);
        $thread->pin = true;
        $thread->save();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'thread' , 'message' => 'pined']);
    }


    public function unpin(Request $request, int $id)
    {
        $thread = Thread::find($id);
        $thread->pin = false;
        $thread->save();
        $request->session()->flash('flash' , ['type'=>'success' , 
        'title'=>'thread' , 'message' => 'unpined']);
    }
}
