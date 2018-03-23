<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    //工作经历表
    protected $table = 're_work';
    protected $primaryKey = 'work_id';
    public $timestamps = false;

    //添加
    static public function add_work($data)
    {
        return Work::insert($data);
    }

    //修改
    static public function edit_work($work_id,$input)
    {
        return Work::where('work_id',$work_id)->update($input);
    }

    //查询工作经历

    static public function get_work($info_id)
    {
        return self::where('info_id',$info_id)->first();
    }
}
