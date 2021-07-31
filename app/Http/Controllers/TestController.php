<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\MessageLike;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    //

    public function __invoke()
    {
       
       $mes = Message::find(2);
       $messages = $mes->thread->messages;
       return var_dump($messages);
    }

    public function test()
    {
        $mes = Message::find(2);
        $messages = $mes->thread->messages;
        return var_dump($messages);
    }
}
