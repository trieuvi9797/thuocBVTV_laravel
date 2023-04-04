<?php 
namespace App\Http\View\Composers;

use App\Http\Services\Category\CategoryService;
use App\Http\Services\InfoPage\InfoPageService;
use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $infoPage;
    protected $category;
    protected $user;
    public function __construct(InfoPageService $infoPage, CategoryService $category)
    {
        $this->infoPage = $infoPage;
        $this->category = $category;
    }
    public function compose(View $view)
    {
        $infoPage = $this->infoPage->show();
        $parentCategories = $this->category->getParent();
        $childCategories = Category::with('childrents')->where('parent_id',0)->get();
        $view->with([
            'childCategories' => $childCategories,
            'infoPage' => $infoPage,
            'parentCategories' => $parentCategories
        ]);
    }
}