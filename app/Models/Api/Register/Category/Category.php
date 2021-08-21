<?php

namespace App\Models\Api\Register\Category;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'title', 'url', 'description' ];

} // Category
