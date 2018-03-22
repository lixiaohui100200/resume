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
        $re_id = MyResume::show_my_re();

        return view('resume.newResume',compact('re_id'));
    }

    public function add_resume()
    {
        $id = MyResume::add_resume();
        return \myClass::encode($id);
    }
}
