<?php 
namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $user;
    public function __construct()
    {
        
    }
    public function compose(View $view)
    {
        $childCategories = Category::with('childrents')->where('parent_id',0)->get();
        $view->with('childCategories', $childCategories);
    }
}