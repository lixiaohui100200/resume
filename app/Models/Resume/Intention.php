<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Intention extends Model
{
    //求职意向
    protected $table = 're_intention';
    protected $primaryKey = 'inten_id';
    public $timestamps = false;

    //添加
    static public function add_Intention($data)
    {
        return Intention::insert($data);
    }

    //修改
    static public function edit_intention($inten_id,$data)
    {
        return Intention::where('inten_id',$inten_id)->update($data);
    }

    //查询求职意向
    static public function get_inten($info_id)
    {
        return self::where('info_id',$info_id)->first()->toArray();
    }
}
