<?php

namespace App\Observers\Api\V1\Company;

use App\Models\Api\V1\Company\Company;
use Illuminate\Support\Str;

class CompanyObserver
{
    /**
     * Handle the Company "creating" event.
     *
     * @param  \App\Models\Api\V1\Company\Company  $company
     * @return void
     */
    public function creating( Company $company )
    {
        $company->url = Str::slug( $company->name, '-' );
        $company->uuid = Str::uuid();
    }

    /**
     * Handle the Company "updating" event.
     *
     * @param  \App\Models\Api\V1\Company\Company  $company
     * @return void
     */
    public function updating( Company $company )
    {
        $company->url = Str::slug( $company->name, '-' );
    }

} // CompanyObserver
