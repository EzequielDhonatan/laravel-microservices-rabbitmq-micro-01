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

} // Company
