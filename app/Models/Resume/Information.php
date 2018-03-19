<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    //基本信息表
    protected $table = 're_information';
    protected $primaryKey = 'info_id';
    public $timestamps = false;

    //添加数据到数据库
    static public function add_info($data)
    {
        return self::insert($data);
    }

    //修改数据
    static  public function edit_info($info_id,$data)
    {
        return self::where('info_id',$info_id)->update($data);
    }
    
    //获取基本信息
    
    static public function get_information($info_id,$user_id)
    {
        return self::where('info_id',$info_id)
            ->where('user_id',$user_id)
            ->first()->toArray();
    }
}
