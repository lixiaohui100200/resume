<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //个人技能
    protected $table = 're_skill';
    protected $primaryKey = 'sk_id';
    public $timestamps = false;

    //添加
    static public function add_sk($data)
    {
        return Skill::insert($data);
    }

    //修改
    static public function edit_sk($sk_id,$input)
    {
        return Skill::where('sk_id',$sk_id)->update($input);
    }

    //查询专业技能
    static public function get_sk($info_id)
    {
        return self::where('sk_id',$info_id)->first()->toArray();
    }
}
