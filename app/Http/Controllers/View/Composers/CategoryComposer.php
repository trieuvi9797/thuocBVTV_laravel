<?php
 
namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;
 
class CategoryComposer
{
    /**
     * Create a new profile composer.
     */
    protected  $users;
    public function __construct(  ) {}
 
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $category = Category::select('id', 'name', 'parent_id')->all()->orderByDesc('id')->get();
        $view->with('category', $category);
    }
}