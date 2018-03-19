<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //项目表
    protected $table = 're_project';
    protected $primaryKey = 'pro_id';
    public $timestamps = false;

    //添加
    static public function add_pro($data)
    {
        return Project::insert($data);
    }

    //修改
    static public function edit_pro($pro_id,$data)
    {
        return Project::where('pro_id',$pro_id)->update($data);
    }

    //查询项目
    static public function get_pro($info_id)
    {
        return self::where('info_id',$info_id)->get()->toArray();
    }


}
