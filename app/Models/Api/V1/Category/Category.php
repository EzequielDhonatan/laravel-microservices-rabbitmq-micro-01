<?php

namespace App\Models\Api\V1\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Api\V1\Company\Company;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'url', 'description' ];

    public function companies()
    {
        return $this->hasOne( Company::class );
    }

} // Category
