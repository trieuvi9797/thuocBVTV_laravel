<?php 
namespace App\Http\View\Composers;

use App\Models\Bill;
use Illuminate\View\View;

class AdminComposer
{

    public function compose(View $view)
    {
        $totalBillNew = Bill::where('active', 0)->count();
        $view->with([
            'totalBillNew' => $totalBillNew
        ]);
    }
}