<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Graduate extends Model
{
    //教育表
    protected $table = 're_education';
    protected $primaryKey = 'edu_id';
    public $timestamps = false;

    //添加
    static public function add_edu($data)
    {
        return Graduate::insert($data);
    }

    //修改
    static public function edit_edu($edu_id,$data)
    {
        return Graduate::where('edu_id',$edu_id)->update($data);
    }

    //查询教育内容
    static public function get_edu($info_id)
    {
        return self::where('info_id',$info_id)->first()->toArray();
    }
}
