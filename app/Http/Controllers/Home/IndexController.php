<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //简历书写页面
    public function index()
    {
        return view('resume.index');
    }
}
