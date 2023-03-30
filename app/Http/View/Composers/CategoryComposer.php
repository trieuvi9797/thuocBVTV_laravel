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
        $parent_categories = Category::select('id','name','parent_id')->where('parent_id',0)->orderByDesc('id')->get();
        $view->with('parent_categories', $parent_categories);
    }
}