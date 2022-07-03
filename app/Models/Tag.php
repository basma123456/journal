<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\abstracts\UnicodeModel;

class Tag extends UnicodeModel
{
    use HasFactory;
    protected $guarded = [];
}
