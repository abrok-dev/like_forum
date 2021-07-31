<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Forum;
use App\Repository\MessageRepository;
use App\Repository\ThreadRepository;
use App\Models\User;
use App\Repository\UserRepository;
use App\Services\ForumService;
use Illuminate\Http\Response;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    //



    public function index()
    {

    }


    public function show (string $slug)
    {

    }

    public function category(string $category)
    {

    }

    public function lock(int $id , string $slug)
    {

    }
    public function unlock(int $id , string $slug)
    {
        
    }
}
