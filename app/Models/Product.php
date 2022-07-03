<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\abstracts\UnicodeModel;

class Product extends UnicodeModel
{
    use HasFactory;


    protected $fillable = [
        'name', 'detail'
    ];
}
