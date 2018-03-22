<?php

namespace App\Models\Resume;

use Illuminate\Database\Eloquent\Model;

class MyResume extends Model
{
    //我的简历
    protected $table='re_myresume';
    protected $primaryKey = 're_id';
    public $timestamps = false;

    static public function add_resume()
    {
        $user_id['user_id'] = '38';
        return self::insertGetId($user_id);
    }
}
