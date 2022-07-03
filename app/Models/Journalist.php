<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\abstracts\UnicodeModel;


class Journalist extends UnicodeModel
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'journalists';
}
