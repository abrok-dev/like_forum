<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\ForumRepository;

class ForumAdminController extends Controller
{

    private ForumRepository $forumRepository ;

    public function __construct()
    {
        $this->forumRepository = new ForumRepository();
    }
    public function index()
    {
        return view('admin.forum.index' , ['forums' => $this->forumRepository->findForumsWithCategory()]);
    }
}

?>