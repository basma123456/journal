<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    use ImageTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


}
