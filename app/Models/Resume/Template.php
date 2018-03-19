<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    //简历模板地址
    protected $table = 're_template';
    protected $primaryKey = 'temp_id';
    public $timestamps =false;

    //添加地址到数据库
    static public function add_temple($data)
    {
       return self::insert($data);
    }
}
