<?php
namespace App\Repository;

use App\Models\Category;


class CategoryRepository
{
    public function findAllCategories()
    {
        return Category::all();
    }
}

?>