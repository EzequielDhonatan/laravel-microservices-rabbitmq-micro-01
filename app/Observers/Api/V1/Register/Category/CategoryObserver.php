<?php

namespace App\Observers\Api\V1\Register\Category;

use App\Models\Api\V1\Register\Category\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the Category "creating" event.
     *
     * @param  \App\Models\Api\V1\Register\Category\Category  $category
     * @return void
     */
    public function creating( Category $category )
    {
        $category->url = Str::slug( $category->title, '-' );
    }

    /**
     * Handle the Category "updating" event.
     *
     * @param  \App\Models\Api\V1\Register\Category\Category  $category
     * @return void
     */
    public function updating( Category $category )
    {
        $category->url = Str::slug( $category->title, '-' );
    }

} // CategoryObserver
