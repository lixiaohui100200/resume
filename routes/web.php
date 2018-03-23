<?php

/*
 * 简历模块start
 */
Route::any('/resume/{re_id}','Home\ResumeController@index');
Route::any('/','Home\IndexController@newResume');
Route::any('/add_res/','Home\IndexController@add_resume');
//简历生产模板
Route::any('resume_template','Home\ResumeController@template');
//添加基本信息
Route::any('re_add_info/{re_id}','Home\ResumeController@add_information');
//添加教育模块
Route::any('re_add_graduate/{edu_id?}','Home\ResumeController@add_graduate');
//添加个人评价
Route::any('re_add_eval/{eva_id?}','Home\ResumeController@add_evaluate');
//添加求职意向
Route::any('re_add_inten/{info_id}/{inten_id?}','Home\ResumeController@add_intention');
//添加项目
Route::any('re_add_pro/{pro_id?}','Home\ResumeController@add_project');
//添加个人技能
Route::any('re_add_sk/{sk_id?}','Home\ResumeController@add_skill');
//添加工作经历
Route::any('re_add_work/{work_id?}','Home\ResumeController@add_work');


/*
 * 简历模块end
 */
