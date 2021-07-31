<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use League\CommonMark\Util\ArrayCollection;

class Category extends Model
{
    use HasFactory;
    /**
     * @
     * 
     * 
     */
    protected $table = 'category';
   

    public function forums()
    {
        return $this->hasMany(Forum::class, 'category_id');
    }
}
