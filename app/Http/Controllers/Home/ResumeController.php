<?php

namespace App\Http\Controllers\Home;

use App\Models\Resume\Evaluate;
use App\Models\Resume\Graduate;
use App\Models\Resume\Information;
use App\Models\Resume\Intention;
use App\Models\Resume\Project;
use App\Models\Resume\Skill;
use App\Models\Resume\Work;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpWord\TemplateProcessor;

class ResumeController extends Controller
{
    //简历书写主界面
    public function index($yes=null)
    {
        $info_id = 1;
        $user_id = 38;//session('user_id');
        //基本信息
        $information = Information::get_information($info_id,$user_id);
        //获得教育经历
        $education = Graduate::get_edu($info_id);
        //查询工作经历
        $work = Work::get_work($info_id);
        //查询专业技能
        $skill = Skill::get_sk($info_id);
        //查询项目
        $project = Project::get_pro($info_id);
        //查询求职意向
        $intention = Intention::get_inten($info_id);
        //查询个人评价
        $evaluate = Evaluate::get_eval($info_id);

        function birthday($birthday){
            $age = strtotime($birthday);
            if($age === false){
                return false;
            }
            list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age));
            $now = strtotime("now");
            list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now));
            $age = $y2 - $y1;
            if((int)($m2.$d2) < (int)($m1.$d1))
                $age -= 1;
            return $age;
        }
        $information['birthday'] = $information['birthday'] ? birthday($information['birthday']):0;
        if (!$yes){
            return view('resume.myresume',compact('information','education','work','skill','project','intention','evaluate'));
        }else{
            return compact('information','education','work','skill','project','intention','evaluate');

        }

    }

    //模板生成模块
    public function template(Request $request)
    {
        function changeStr($data,$str1,$str2){
            foreach ($data as $k=>$v){
                $str1 .= $v .'<<<===>>>';
                $str2 .= $k .'<<<===>>>';

            }
            return $data = [
                'str1' =>$str1,
                'str2' =>$str2,
            ];
        }
        function changeStr2($data,$str1,$str2){
            $str3 = '';
            foreach ($data as $v){

                foreach ($v as $k=>$va){

                    $str1 .= $va .'<<<===>>>';
                    $str2 .= $k .$str3 .'<<<===>>>';

                }
                $str3 = $str3+1;
            }
            return $data = [
                'str1' =>$str1,
                'str2' =>$str2,
            ];
        }
        $re = $this->index(1);
        $a ='';
        $b = '';
        $data = changeStr($re['information'],$a,$b);
        $data = changeStr($re['education'],$data['str1'],$data['str2']);
        $data = changeStr2($re['project'],$data['str1'],$data['str2']);
        $data = changeStr($re['work'],$data['str1'],$data['str2']);
        $data = changeStr($re['skill'],$data['str1'],$data['str2']);
        $data = changeStr($re['intention'],$data['str1'],$data['str2']);
        $data = changeStr($re['evaluate'],$data['str1'],$data['str2']);
        $arr = explode('<<<===>>>',$data['str1']);
        $arr2 = explode('<<<===>>>',$data['str2']);

        dd(count($re['project']));
            $template_name = '1.docx';
            $path = 'resumePublic/resumeTemplate/'.$template_name;
            $template = new TemplateProcessor($path);
            $template->setValue($arr2,$arr);
            $template->saveAs('test.docx');
            $fileName = 'test.docx'; //得到文件名
            //header前不能有任何输出
            header( "Content-Disposition:  attachment;  filename=".$fileName); //告诉浏览器通过附件形式来处理文件
            header('Content-Length: ' . filesize($fileName)); //下载文件大小
            readfile($fileName);  //读取文件内容
            @unlink($fileName); //删除旧目录下的文件
    }

    //过滤数据html标签为实体
    public function html($data)
    {

        foreach ($data as $k=>$va){

            $data[$k]=htmlspecialchars($va);
        }
        foreach ($data as $key=>$v){

            $data[$key] = str_replace(array("\r\n", "\r", "\n"),"<w:br />",$v);
        }
        return $data;
    }

    //添加或修改基本信息
    public function add_information(Request $request,$info_id=null)
    {
        if ($request->isMethod('post')){
            $input = $request->only('name','sex','birthday','nation','native_place',
                'edu','major','email','work_year','telphone');
            $input = $this->html($input);
            $rule = [
                'name' => 'required|max:20',
                'sex' => 'required|max:2',
                'birthday' => 'required|max:10',
                'nation' => 'required|max:10',
                'native_place' => 'required|max:20',
                'edu' => 'required|max:15',
                'major' => 'required|max:15',
                'email' => 'required|max:50',
                'work_year' => 'required|max:5',
                'telphone' => 'required|max:20',
            ];
            $message = [
                'name.required' => '姓名不能为空',
                'name.max' => '姓名长度不能超过11位',
                'sex.required' => '性别不能为空',
                'sex.max' => '性别长度不能超过2位',
                'birthday.required' => '生日不能为空',
                'birthday.max' => '生日长度不能超过10位',
                'nation.required' => '民族不能为空',
                'nation.max' => '民族长度不能超过10',
                'native_place.required' => '籍贯不能为空',
                'native_place.max' => '籍贯长度不能超过20位',
                'edu.required' => '学历不能为空',
                'edu.max' => '学历长度不能超过15位',
                'major.required' => '专业不能为空',
                'major.max' => '专业长度不能超过15位',
                'email.required' => '邮箱不能为空',
                'email.max' => '邮箱长度不能超过50位',
                'work_year.required' => '工作年限不能为空',
                'work_year.max' => '工作年限长度不能超过5位',
                'telphone.required' => '电话不能为空',
                'telphone.max' => '电话长度不能超过20',
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                $input['user_id'] = 38;//session('user_id');
                $input['last_time'] = date('Y-m-d H:i:s');
                if ($info_id){
                    if (Information::edit_info($info_id,$input)){
                        return $data = [
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if(Information::add_info($input)){
                    return $data = [
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }

            }else{
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v){
                    $str .= $v .'';
                }
                return $data=[
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }

    }

    //添加或修改教育经历
    public function add_graduate(Request $request,$edu_id=null)
    {
        //传入info_id 并且加密
        date_default_timezone_set('PRC');
        if ($request->isMethod('post')){
            $input = $request->only('graduate_time_start','graduate_time_end',
                'edu_major','edu_school','edu');
            $input = $this->html($input);
            $rule = [
                'graduate_time_start' => 'required|max:11',
                'graduate_time_end' => 'required|max:11',
                'edu_major' => 'required|max:10',
                'edu_school' => 'required|max:30',
                'edu' => 'required|max:10',
            ];
            $message = [
                'graduate_time_start.required' => '开始时间不能为空',
                'graduate_time_start.max' => '开始时间不能超过11位',
                'graduate_time_end.required' => '结束时间不能为空',
                'graduate_time_end.max' => '结束时间不能超过11位',
                'edu_major.required' => '专业不能为空',
                'edu_major.max' => '专业长豆不能超过10位',
                'edu_school.required' => '学校不能为空',
                'edu_school.max' => '学校长度不能超过30位',
                'edu.required' => '学历不能为空',
                'edu.max' => '学历长度不能超过10位',
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                //获取基本信息的info_id
                $input['info_id'] = 1;
                $input['add_time'] = date('Y-m-d H:i:s');
                if ($edu_id){
                    if (Graduate::edit_edu($edu_id,$input)){
                        return $data=[
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if (Graduate::add_edu($input)){
                    return $data=[
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }
            }else{
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v){
                    $str .= $v .'';
                }
                return $data=[
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }
    }

    //添加或修改个人评价
    public function add_evaluate(Request $request,$eva_id=null)
    {
        //传入info_id 并且加密
        date_default_timezone_set('PRC');
        if($request->isMethod('post')){
            $input = $request->only('evaluate');
            $input = $this->html($input);
            $rule = [
                'evaluate' => 'required|max:300',
            ];
            $message = [
                'evaluate.required' => '个人评价不能为空',
                'evaluate.max' => '个人评价长度不能超过300位'
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                $input['info_id'] = 1;
                $input['add_time'] = date('Y-m-d H:i:s');
                if ($eva_id){
                    if (Evaluate::edit_evaluate($eva_id,$input)){
                        return $data=[
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if (Evaluate::add_evaluate($input)){
                    return $data=[
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }
            }else{
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v){
                    $str .= $v .'';
                }
                return $data=[
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }
    }

    //添加或修改求职意向
    public function add_intention(Request $request,$inten_id=null)
    {
        //传入info_id 并加密
        date_default_timezone_set('PRC');
        if ($request->isMethod('post')){
            $input = $request->only('money','job','city');
            $input = $this->html($input);
            $rule = [
                'money' => 'required|max:4',
                'job' => 'required|max:20',
                'city' => 'required|max:8',
            ];

            $message = [
                'money.required' => '期望薪资不能为空',
                'money.max' => '期望薪资不能超过4位',
                'job.required' => '岗位不能为空',
                'job.max' => '岗位长度不能超过20',
                'city.required' => '就业城市不能为空',
                'city.max' => '就业城市不能超过8位',
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                $input['info_id'] = 1;
                $input['add_time'] = date('Y-m-d H:i:s');
                if ($inten_id){
                    if (Intention::edit_intention($inten_id,$input)){
                        return $data=[
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if (Intention::add_Intention($input)){
                    return $data=[
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }
             }else{
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v){
                    $str .= $v .'';
                }
                return $data=[
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }
    }

    //添加或修改项目
    public function add_project(Request $request,$pro_id=null)
    {
        //传入info_id 加密id
        date_default_timezone_set('PRC');
        if ($request->isMethod('post')){
            $input = $request->only('pro_name','pro_time_star','pro_time_end','operation','tool','art','pro_description','duty_description');
            $input = $this->html($input);
            $rule = [
                'pro_name' => 'required|max:20',
                'pro_time_star' => 'required|max:11',
                'pro_time_end' => 'required|max:11',
                'operation' => 'required|max:100',
                'tool' => 'required|max:100',
                'art' => 'required|max:100',
                'pro_description' => 'required|max:500',
                'duty_description' => 'required|max:1000',
            ];

            $message = [
                'pro_name.required' => '项目名称不能为空',
                'pro_name.max' => '项目名称长度不能超过20位',
                'pro_time_star.required' => '项目开始时间不能为空',
                'pro_time_star.max' => '项目开始时间不能超过11位',
                'pro_time_end.required' => '项目结束时间不能为空',
                'pro_time_end.max' => '项目时间不能超过11位',
                'operation.required' => '运行环境不能为空',
                'operation.max' => '运行环境长度不能超过100',
                'tool.required' => '工具不能为空',
                'tool.max' => '工具长度不能超过100',
                'art.required' => '所用技术框架不能为空',
                'art.max' => '所用技术框架不能超过100位',
                'pro_description.required' => '项目描述不能为空',
                'pro_description.max' => '项目描述长度不能超过500位',
                'duty_description.required' => '责任描述不能为空',
                'duty_description.max' => '责任描述长度不能超过1000位',
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                $input['info_id'] = 1;
                $input['add_time'] = date('Y-m-d H:i:s');
                if ($pro_id){
                    if (Project::edit_pro($pro_id,$input)){
                        return $data=[
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if (Project::add_pro($input)){
                    return $data=[
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }
            }else{
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v){
                    $str .= $v .'';
                }
                return $data=[
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }
    }

    //添加或修改个人技能
    public function add_skill(Request $request,$sk_id=null)
    {
        //传入info_id 并且加密
        date_default_timezone_set('PRC');
        if ($request->isMethod('post')){
            $input = $request->only('skill');
            $input = $this->html($input);
            $rule = [
                'skill' => 'required|max:800'
            ];

            $message = [
                'skill.required' => '个人技能不能为空',
                'skill.max' => '个人技能长度不能超过800',
            ];
            $validator = Validator::make($input,$rule,$message);
            if ($validator->passes()){
                $input['info_id'] = 1;
                $input['add_time'] = date('Y-m-d H:i:s');
                if ($sk_id){
                    if (Skill::edit_sk($sk_id,$input)){
                        return $data=[
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if (Skill::add_sk($input)){
                    return $data=[
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }
            }else{
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v){
                    $str .= $v .'';
                }
                return $data=[
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }
    }

    //添加或修改工作经历
    public function add_work(Request $request,$work_id=null)
    {
        //传入info_id 并且加密
        date_default_timezone_set('PRC');
        if ($request->isMethod('post')){
            $input = $request->only('company', 'position', 'work_time_start', 'work_time_end', 'work_content');
            $input = $this->html($input);
            $rule = [
                'company' => 'required|max:20',
                'position' => 'required|max:10',
                'work_time_start' => 'required|max:11',
                'work_time_end' => 'required|max:11',
                'work_content' => 'required|max:200',

            ];

            $message = [
                'company.required' => '公司名称不能为空',
                'company.max' => '公司名称长度不能超过20位',
                'position.required' => '职位不能为空',
                'position.max' => '职位长度不能超过10位',
                'work_time_start.required' => '开始时间不能为空',
                'work_time_start.max' => '开始时间长度不能超过11位',
                'work_time_end.required' => '结束时间不能为空',
                'work_time_end.max' => '结束时间不能超过11位',
                'work_content.required' => '工作描述不能为空',
                'work_content.max' => '工作描述不能超过200位',
            ];
            $validator = Validator::make($input, $rule, $message);
            if ($validator->passes()) {
                $input['info_id'] = 1;
                $input['add_time'] = date('Y-m-d H:i:s');
                if ($work_id){
                    if (Work::edit_work($work_id,$input)){
                        return $data = [
                            'state' => 200,
                            'msg' => '修改成功'
                        ];
                    }
                }
                if (Work::add_work($input)) {
                    return $data = [
                        'state' => 200,
                        'msg' => '添加成功'
                    ];
                }
            } else {
                $errors = $validator->errors()->all();
                $str = '';
                foreach ($errors as $v) {
                    $str .= $v . '';
                }
                return $data = [
                    'state' => 100,
                    'msg' => $str
                ];
            }
        }

    }
}
