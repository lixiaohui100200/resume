<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class MyResume extends Model
{
    //我的简历
    protected $table='re_myresume';
    protected $primaryKey = 're_id';
    public $timestamps = false;

    //添加简历的
    static public function add_resume()
    {
        $user_id['user_id'] = '38';//session
        return self::insertGetId($user_id);
    }

    //展示我的简历
    static public function show_my_re()
    {
        $user_id = '38';//session
        return self::where('user_id',$user_id)->select('re_id')->get();
    }
}
