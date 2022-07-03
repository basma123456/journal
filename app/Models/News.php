<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\abstracts\UnicodeModel;

class News extends UnicodeModel
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'news';
}
