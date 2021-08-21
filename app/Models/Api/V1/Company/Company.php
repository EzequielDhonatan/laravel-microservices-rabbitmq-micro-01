<?php

namespace App\Models\Api\V1\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Api\V1\Category\Category;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [

        'category_id',

        'name', 'url',

        'phone', 'whatsapp', 'email',
        'facebook', 'instagram', 'youtube'

    ]; // fillable

    public function category()
    {
        return $this->belongsTo( Category::class );
    }

    public function getCompanies( string $filter = '' )
    {
        $companies = $this->with( 'category' )
                            ->where( function ( $query ) use ( $filter ) {
                                if ( $filter != '' ) {

                                    $query->where( 'name', 'LIKE', "%{$filter}%" );
                                    $query->orWhere( 'email', '=', $filter );
                                    $query->orWhere( 'phone', '=', $filter );

                                } // if
                            })
                            ->paginate();

        return $companies;

    } // getCompanies

} // Company
