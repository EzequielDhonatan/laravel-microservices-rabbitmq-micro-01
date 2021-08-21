<?php

namespace App\Models\Api\V1\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [

        'cactegory_id',

        'name', 'url',

        'phone', 'whatsapp', 'email',
        'facebook', 'instagram', 'youtube'

    ]; // fillable

} // Company
