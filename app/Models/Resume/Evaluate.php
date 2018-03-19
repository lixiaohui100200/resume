<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Evaluate extends Model
{
    //个人评价
    protected $table = 're_evaluate';
    protected $primaryKey = 'eva_id';
    public $timestamps = false;

    //添加
    static public function add_evaluate($data)
    {
        return Evaluate::insert($data);
    }

    //修改
    static public function edit_evaluate($eva_id,$data)
    {
        return Evaluate::where('eva_id',$eva_id)->update($data);
    }

    //查询
    static public function get_eval($info_id)
    {
        return self::where('info_id',$info_id)->first()->toArray();
    }
}
