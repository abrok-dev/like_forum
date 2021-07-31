<?php
namespace App\Repository;

use App\Models\Forum;
use App\Models\Category as Category;
use DateTime;
use Illuminate\Support\Facades\DB as DB;
class ForumRepository
{
   public function findForumsByCategory(Category $category )
   {
    return  Forum::where('user.category_id' ,$category->id)->get();
    

   }

    public function findForumsWithCategory()
        {
        return    DB::table('forums')
            ->join('category', 'forums.category_id' , '=','category.id')
            ->select('forums.*','category as category.title')->get();
        }

}

?>