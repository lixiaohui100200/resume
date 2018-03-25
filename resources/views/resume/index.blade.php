<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Starter Template for Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('resume/css/index.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('layui/css/layui.css')}}">
</head>

<body style="background-color: #00c790">

<nav class="navbar navbar-default" style="background-color: #ffffff">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">LOGO</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">链接 <span class="sr-only">(current)</span></a></li>
                <li><a href="#">链接</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">下载 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">链接</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">下载 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<div class="container">


    <div class="row">

        <div class="col-sm-8 blog-main">
            <div class="resume_top">
                <div class="resume_basic" id="information">
                    <h2>{{$information['name'] or '姓名'}}</h2>
                    @if(empty($information))
                    <div class="null_message" data-toggle="modal" data-target="#information_model">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        添加基本信息
                    </div>
                    @else
                    <div class="information_border" data-toggle="modal" data-target="#information_model">

                        <span class="glyphicon glyphicon-pencil"></span>
                        <div><span>性别</span>：<span>{{$information['sex']}}</span></div>
                        <div><span>年龄</span>：<span>{{$information['age']}}</span></div>
                        <div><span>民族</span>：<span>{{$information['nation']}}</span></div>
                        <div><span>籍贯</span>：<span>{{$information['native_place']}}</span></div>
                        <div><span>工作年限</span>：<span>{{$information['work_year']}}</span></div>
                        <div><span>电话</span>：<span>{{$information['telphone']}}</span></div>
                        <div><span>邮箱</span>：<span>{{$information['email']}}</span></div>
                    </div>
                        @endif
                </div>
                <div class="resume_down">
                    <!--求职意向-->
                    <div class="intention" id="intention">
                        <dl>
                            <dt>
                                <span class="resume_title">求职意向</span><span class="resume_title_t"></span>
                            </dt>
                            @if(empty($intention))
                            <div class="null_message"  data-toggle="modal" data-target="#intention_model">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                添加求职意向
                            </div>
                            @else
                            <dd>
                                <div class="intention_content">
                                    <div class="intention_border" data-toggle="modal" data-target="#intention_model">
                                        <span class="glyphicon glyphicon-pencil glyphicon_edit"></span>
                                        <div class="intention">
                                            <span class="glyphicon glyphicon-lock"></span><span>求职意向:&emsp;</span>{{$intention->job}}
                                        </div>
                                        <div class="money">
                                            <span class="glyphicon glyphicon-jpy"></span><span>期望薪资:&emsp;</span>{{$intention->money}}
                                        </div>
                                        <div class="city">
                                            <span class="glyphicon glyphicon-object-align-bottom"></span><span>期望城市:&emsp;</span>{{$intention->city}}
                                        </div>
                                    </div>
                                </div>
                            </dd>
                                @endif
                        </dl>
                    </div>
                    <!--专业技能-->
                    <div class="intention" id="skill">
                        <dl>
                            <dt>
                                <span class="resume_title">专业技能</span><span class="resume_title_t"></span>
                            </dt>
                            @if(empty($skill))
                            <div class="null_message" data-toggle="modal" data-target="#skill_model">
                                <span class="glyphicon glyphicon-plus-sign"></span>
                                添加专业技能
                            </div>
                            @else
                            <dd>
                                <div class="skill_border" data-toggle="modal" data-target="#skill_model">
                                    <div class="glyphicon glyphicon-pencil"></div>
                                    <div class="skill_content">
                                        {!! $skill->skill !!}
                                    </div>
                                </div>
                            </dd>
                                @endif
                        </dl>
                    </div>
                    <!--工作经历-->
                    <div class="work" id="work">
                        <dl>
                            <dt>
                                <span class="resume_title">工作经历</span><span class="resume_title_t"></span>
                            </dt>
                            <dd>
                                <div class="work" data-toggle="modal" data-target="#work_model">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <div>
                                        <span class="glyphicon glyphicon-calendar"></span><span>工作时间</span>
                                    </div>
                                    <div>
                                        <span class="glyphicon glyphicon-briefcase"></span><span>公司名称</span>
                                    </div>
                                    <div>
                                        <span class="glyphicon glyphicon-user"></span><span>求职岗位</span>
                                    </div>
                                    <div>
                                        <span class="glyphicon glyphicon-folder-open"></span><span>岗位职责</span>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <!--项目经历-->
                    <div class="work" id="project">
                        <dl>
                            <dt>
                                <span class="resume_title">项目经历</span><span class="resume_title_t"></span>
                            </dt>
                            <dd>
                                <div class="work" data-toggle="modal" data-target="#project_model">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <div>
                                        <span>项目名称：</span>
                                        <span>云足疗</span>
                                    </div>
                                    <div>
                                        <span>开发周期：</span>
                                        <span>2017-10至2018-02</span>
                                    </div>
                                    <div>
                                        <span>运行环境：</span>
                                        <span>LAMP</span>
                                    </div>
                                    <div>
                                        <span>开发工具：</span>
                                        <span>PHPSTORM</span>
                                    </div>
                                    <div>
                                        <span>开发技术及框架：</span>
                                        <span style="display: block;padding-left: 70px">LARAVEL</span>
                                    </div>
                                    <div>
                                        <span>项目描述：</span>
                                        <span style="display: block;padding-left: 70px">项目描述项目描述项目描述项目描述项目描述项目描述项目描述项目描述项目描述项目描述</span>
                                    </div>
                                    <div>
                                        <span>责任描述：</span>
                                        <span style="display: block;padding-left: 70px">责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述责任描述</span>
                                    </div>
                                </div>
                            </dd>
                        </dl>
                    </div>
                    <!--教育经历-->
                    <div class="work education" id="education">
                        <dl>
                            <dt>
                                <span class="resume_title">教育经历</span><span class="resume_title_t"></span>
                            </dt>
                            @if(empty($education))
                                <div class="null_message" data-toggle="modal" data-target="#education_model">
                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                    添加教育经历
                                </div>
                            @else
                            <dd>
                                <div class="work education" data-toggle="modal" data-target="#education_model">
                                    <span class="glyphicon glyphicon-pencil"></span>

                                    <div>
                                        </span><span>时间:</span>&nbsp;{{$education->graduate_time}}
                                    </div>
                                    <div>
                                        </span><span>学校:</span>&nbsp;{{$education->edu_school}}
                                    </div>
                                    <div>
                                        </span><span>专业:</span>&nbsp;{{$education->edu_major}}
                                    </div>
                                    <div>
                                        </span><span>学历:</span>&nbsp;{{$education->education}}
                                    </div>
                                </div>
                            </dd>
                            @endif
                        </dl>
                    </div>
                    <!--个人评价-->
                    <div class="work" id="inter">
                        <dl>
                            <dt>
                                <span class="resume_title">个人评价</span><span class="resume_title_t"></span>
                            </dt>
                            @if(empty($evaluate))
                                <div class="null_message" data-toggle="modal" data-target="#evaluate_model">
                                    <span class="glyphicon glyphicon-plus-sign"></span>
                                    添加个人评价
                                </div>
                            @else
                            <dd>
                                <div class="work" data-toggle="modal" data-target="#evaluate_model">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                    <div class="intention">
                                        @if(!empty($evaluate)) {!! $evaluate->evaluate !!} @endif
                                    </div>

                                </div>
                            </dd>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>


        </div>
        <!--侧边栏-->
        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">

            <div class="sidebar-module">
                <ol class="list-unstyled">
                    <li><a href="javascript:;" class="information_jump"><span class="glyphicon glyphicon-user"></span>
                        &emsp;&emsp;基本信息</a></li>
                    <li><a href="javascript:;" class="intention_jump"><span
                            class="glyphicon glyphicon-briefcase"></span>&emsp;&emsp;求职意向</a></li>
                    <li><a href="javascript:;" class="skill_jump"><span class="glyphicon glyphicon-wrench"></span>&emsp;&emsp;专业技能</a>
                    </li>
                    <li><a href="javascript:;" class="work_jump"><span class="glyphicon glyphicon-road"></span>&emsp;&emsp;工作经历</a>
                    </li>
                    <li><a href="javascript:;" class="project_jump"><span
                            class="glyphicon glyphicon-folder-close"></span>&emsp;&emsp;项目经历</a></li>
                    <li><a href="javascript:;" class="edu_jump"><span class="glyphicon glyphicon-book"></span>&emsp;&emsp;教育经历</a>
                    </li>
                    <li><a href="javascript:;" class="inter_jump"><span class="glyphicon glyphicon-thumbs-up"></span>&emsp;&emsp;个人评价</a>
                    </li>
                </ol>
            </div>
        </div><!-- 侧边栏 -->

        <span class="glyphicon glyphicon-circle-arrow-up" id="top_id"></span><!--回到顶部-->
    </div><!-- /.row -->

</div><!-- /.container -->



<!--模态框-->
<!-- Modal 基本信息-->
<div class="modal fade" id="information_model" tabindex="-1" role="dialog" aria-labelledby="">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="">基本信息</h4>
            </div>

            <div class="modal-body ">
                <form class="layui-form form-inline" id="information_data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>姓名</label>
                        <input type="text" name="name" class="form-control" id="username" value="{{$information['name'] or ''}}" data-content="" data-placement="top">
                    </div>
                    <div class="form-group">
                        <label>性别</label>
                        <input type="radio" name="sex" value="男" title="男" @if(!empty($information) && $information['sex']=='男') checked @else checked @endif>
                        <input type="radio" name="sex" value="女" title="女" @if(!empty($information) && $information['sex']=='女') checked @endif>
                    </div>
                    <div class="form-group">
                        <label>出生年月</label>
                        <input type="text" name="birthday" id="birthday" value="{{$information['birthday'] or ''}}" class="layui-input form-control">
                    </div>
                    <div class="form-group">
                        <label>民族</label>
                        <input type="text" name="nation" value="{{$information['nation'] or ''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>籍贯</label>
                        <input type="text" name="native_place" value="{{$information['native_place'] or ''}}" class="form-control">
                    </div>
                    <div class="form-group" style="display: inline-block">
                        <label>工作年限</label>
                        <select name="work_year"  lay-verify="" >
                            <option value="1年" @if(!empty($information) && $information['work_year']=='1年') selected @endif>1年</option>
                            <option value="2年" @if(!empty($information) && $information['work_year']=='2年') selected @endif>2年</option>
                            <option value="3年" @if(!empty($information) && $information['work_year']=='3年') selected @endif>3年</option>
                            <option value="4年" @if(!empty($information) && $information['work_year']=='4年') selected @endif>4年</option>
                            <option value="5年" @if(!empty($information) && $information['work_year']=='5年') selected @endif>5年</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>电话</label>
                        <input type="text" class="form-control" id="tel_phone" name="telphone" value="{{$information['telphone'] or ''}}" data-content="" data-placement="top">
                    </div>
                    <div class="form-group">
                        <label>邮箱</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$information['email'] or ''}}" data-content="" data-placement="top">

                    </div>
                    <input type="hidden" id="re_id" value="{{\Illuminate\Support\Facades\Route::input('re_id')}}">
                    <input type="hidden" id="info_add_url" value="{{url('/re_add_info')}}">
                </form>
        </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary information_btn"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 求职意向-->
<div class="modal fade bs-example-modal-sm" id="intention_model" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="width: 358px;margin-top: 130px">
        <div class="modal-content" style="width: 360px">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">求职意向</h4>
            </div>

            <div class="modal-body">
                <form class="layui-form form-inline" id="intention_data">
                    {{csrf_field()}}
                    <div class="form-group">
                            <label>求职意向</label>
                            <select name="job">
                                <option @if(!empty($intention) && $intention['job']=='PHP工程师') selected @endif value="PHP工程师">PHP工程师</option>
                                <option @if(!empty($intention) && $intention['job']=='WEB工程师') selected @endif value="WEB工程师">WEB工程师</option>
                                <option @if(!empty($intention) && $intention['job']=='PHP全栈工程师') selected @endif value="PHP全栈工程师">PHP全栈工程师</option>
                                <option @if(!empty($intention) && $intention['job']=='WEB全栈工程师') selected @endif value="WEB全栈工程师">WEB全栈工程师</option>
                            </select>
                        </div>
                    <div class="form-group">
                        <label>期望薪资</label>
                        <input type="text" id="money" name="money" value="{{$intention->money or ''}}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>意向城市</label>
                        <input type="text" id="city" name="city" value="{{$intention->city or ''}}" class="form-control">
                    </div>
                    <input type="hidden" id="intention_info_id" value="@if(empty($information['info_id'])) {{myClass::encode('asdf')}} @else {{myClass::encode($information['info_id'])}} @endif">
                    <input type="hidden" id="intention_url" value="{{url('re_add_inten')}}">
                    <input type="hidden" id="intention_inten_id" value="@if(empty($intention->inten_id)) {{myClass::encode('asdf')}} @else {{myClass::encode($intention->inten_id)}} @endif">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-intention"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default " data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 专业技能-->
<div class="modal fade" id="skill_model" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" >专业技能</h4>
            </div>

            <div class="modal-body ">
                <form class="form-inline" id="skill_data">
                    {{csrf_field()}}
                    <textarea class="form-control text_skill" name="skill" id="skill_text" rows="10" style="width: 620px"></textarea>
                    <input type="hidden" id="skill_info_id" value="@if(empty($information['info_id'])) {{myClass::encode('asdf')}} @else {{myClass::encode($information['info_id'])}} @endif">
                    <input type="hidden" id="skill_sk_id" value="@if(empty($skill->sk_id)) {{myClass::encode('asdf')}} @else {{myClass::encode($skill->sk_id)}} @endif">
                    <input type="hidden" id="skill_url" value="{{url('re_add_sk')}}">

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary skill_btn"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 工作经历-->
<div class="modal fade bs-example-modal-sm" id="work_model" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="width: 358px;">
        <div class="modal-content" style="width: 360px">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">求职意向</h4>
            </div>

            <div class="modal-body">
                <form class="layui-form form-inline">
                    <div class="form-group">
                        <label>工作时间</label>
                        <input type="text" class="layui-input form-control" id="test8" placeholder="XX年XX月-XX年XX月">
                    </div>

                    <div class="form-group">
                        <label>公司名称</label>
                        <input type="text"  class="form-control">
                    </div>

                    <div class="form-group">
                        <label>求职岗位</label>
                        <select name="city">
                            <option value="">请选择</option>
                            <option value="PHP工程师">PHP工程师</option>
                            <option value="WEB工程师">WEB工程师</option>
                            <option value="PHP全栈工程师">PHP全栈工程师</option>
                            <option value="WEB全栈工程师">WEB全栈工程师</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label style="display: block">岗位职责</label>
                        <textarea class="form-control" rows="10" style="width: 280px"></textarea>
                </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary information_btn"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 项目经历-->
<div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">基本信息</h4>
            </div>

            <div class="modal-body ">
                <form class="layui-form form-inline">
                    <div class="form-group">
                        <label>项目名称</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>开发周期</label>
                        <input type="text" id="test10" placeholder=" XX年XX月-XX年XX月 " class="layui-input form-control">
                    </div>
                    <div class="form-group">
                        <label>运行环境</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>开发工具</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group" style="display: inline-block">
                        <label>项目描述</label>
                        <textarea class="form-control" rows="5" style="width: 580px"></textarea>

                    </div>
                    <div class="form-group" style="display: inline-block">
                        <label>责任描述</label>
                        <textarea class="form-control" rows="10" style="width: 580px"></textarea>

                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary information_btn"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 教育经历-->
<div class="modal fade bs-example-modal-sm" id="education_model" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document" style="width: 358px;">
        <div class="modal-content" style="width: 360px">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">教育经历</h4>
            </div>

            <div class="modal-body">
                <form class="layui-form form-inline">
                    <div class="form-group">
                        <label>时间</label>
                        <input type="text" class="layui-input form-control edu_text" id="test9" placeholder="@if(empty($education))XX年XX月-XX年XX月@else{{$education->graduate_time}} @endif">
                    </div>

                    <div class="form-group">
                        <label>学校名称</label>
                        <input type="text"  class="form-control" value="{{$education->edu_school or ''}}">
                    </div>
                    <div class="form-group">
                        <label>专业</label>
                        <input type="text"  class="form-control" value="{{$education->edu_major or ''}}">
                    </div>

                    <div class="form-group">
                        <label>学历</label>
                        <select name="city">
                            <option @if(!empty($education->education)) selected @endif value="大专">大专</option>
                            <option @if(!empty($education->education)) selected @endif value="本科">本科</option>
                            <option @if(!empty($education->education)) selected @endif value="硕士">硕士</option>
                            <option @if(!empty($education->education)) selected @endif value="博士">博士</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary education_btn"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal 个人评价-->
<div class="modal fade" id="evaluate_model" tabindex="-1" role="dialog">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2bd8ae">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" >个人评价</h4>
            </div>

            <div class="modal-body ">
                <form class="form-inline" id="evaluate_data">
                    {{csrf_field()}}
                    <textarea class="form-control text_evaluate" name="evaluate" rows="10" style="width: 620px"></textarea>
                    <input type="hidden" id="eval_info_id" value="@if(empty($information['info_id'])) {{myClass::encode('asdf')}} @else {{myClass::encode($information['info_id'])}} @endif">
                    <input type="hidden" id="eval_eva_id" value="@if(empty($evaluate->eva_id)) {{myClass::encode('asdf')}} @else {{myClass::encode($evaluate->eva_id)}} @endif">
                    <input type="hidden" id="eval_url" value="{{url('re_add_eval')}}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary evaluate_btn"
                        style="background-color: #2bd8ae;border: 1px solid #2bd8ae">保存
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('resume/js/index.js')}}"></script>
<script src="{{asset('layui/layui.js')}}"></script>

<script>
$(function () {
    var data = '@if(!empty($skill)){!! $skill->skill !!}@endif'
    re = new RegExp("<br />","g");
    var data = data.replace(re, "\n");

    $('.text_skill').html(data)

    var data1 = '@if(!empty($evaluate)){!! $evaluate->evaluate !!}@endif'
    var data1 = data1.replace(re, "\n");

    $('.text_evaluate').html(data1)
})
</script>
</body>
</html>
