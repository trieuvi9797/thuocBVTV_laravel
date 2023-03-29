<?php
 
namespace App\Http\View\Composers;

use Illuminate\View\View;
 
class MenuComposer
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
        $view->with('count', $this->users->count());
    }
}