<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Repository\ReportRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserAdminController extends Controller
{

    public function index(Request $request)
    {
        $page = $request->get('page',1);
        $paginate = User::all()->forPage($page , 30);
        return view('admin.user.index',[
            'pagination'=> $paginate,
           
        ]);
    }

    public function details(string $slug)
    {
        
        $user = User::find(
            DB::table('users')
            ->where('slug','=',$slug)
            ->select('id')->get() );
            return view('admin.user.details' ,[ 'user'=> $user]);
    }

    public function reset(string $slug)
    {

    }

    public function delete(Request $request, string $slug)
    {
        
    }
}
?>