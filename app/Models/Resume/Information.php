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
    
    static public function get_information($re_id)
    {
        return self::where('re_id',$re_id)->get()->toArray();
    }
    
    //查询基本信息是否存在
    static public function is_exist($re_id)
    {
        return self::where('re_id',$re_id)->select('info_id')->first()->toArray();
    }
}
