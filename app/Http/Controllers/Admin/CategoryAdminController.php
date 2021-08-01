<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repository\CategoryRepository;

class CategoryAdminController extends Controller
{

    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }
    public function index()
    {
    return view('admin.category.index' , 
    ['categories'=> $this->categoryRepository->findAllCategories()]);
    }

    public function add()
    {

    }

    public function edit(int $id)
    {

    }

    public function delete(int $id)
    {

    }

    
}

?>