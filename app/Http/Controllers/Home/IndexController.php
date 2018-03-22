<?php

namespace App\Http\Controllers\Home;

use App\Models\Resume\MyResume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //添加新简历页面
    public function newResume()
    {
        return view('resume.newResume');
    }

    public function add_resume()
    {
        $id = MyResume::add_resume();
        return \myClass::encode($id);
    }
}
