<?php 
namespace App\Http\View\Composers;

use App\Http\Services\InfoPage\InfoPageService;
use App\Models\Category;
use Illuminate\View\View;

class CategoryComposer
{
    protected $infoPage;
    protected $user;
    public function __construct(InfoPageService $infoPage)
    {
        $this->infoPage = $infoPage;
    }
    public function compose(View $view)
    {
        $infoPage = $this->infoPage->get();
        $childCategories = Category::with('childrents')->where('parent_id',0)->get();
        $view->with([
            'childCategories' => $childCategories,
            'infoPage' => $infoPage
        ]);
    }
}