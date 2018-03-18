$(function(){
    //锚点跳转到顶部
    $('#top_id').click(function(){$('html,body').animate({scrollTop: '0px'}, 800);});
    //锚点到
    function to(a,b) {
        $(a).click(function(){$('html,body').animate({scrollTop:$(b).offset().top}, 800);});
    }
    to('.information_jump','#information');
    to('.intention_jump','#intention')
    to('.skill_jump','#skill');
    to('.work_jump','#work');
    to('.project_jump','#project');
    to('.edu_jump','#education');
    to('.inter_jump','#inter')

    $('.information_border').hover(function () {
        $('.information_border .glyphicon').css('display','block')
        $(this).css('cursor','pointer')
    },function () {
        $('.information_border .glyphicon').css('display','none')

    })

    //日期引用
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#birthday', //指定元素
            type:'month'
        });
        //年月范围
        laydate.render({
            elem: '#test8'
            ,type: 'month'
            ,range: true
        });
        laydate.render({
            elem: '#test9'
            ,type: 'month'
            ,range: true
        });
        laydate.render({
            elem: '#test10'
            ,type: 'month'
            ,range: true
        });
    });
    //实例化表单
    layui.use('form', function(){
    });
    //邮箱验证
    $('#email').blur(function(){
        const value = $.trim($('#email').val());
        var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (value.length!=0){
            if (isEmail.test(value)){
                $(this).attr('data-content','')
                $('#email').popover('hide');
            }else{
                $(this).attr('data-content','请输入正确的邮箱')
                $('#email').popover('show');
            }
        }else if (value.length > 50){
            $(this).attr('data-content','邮箱长度不能超过50')
            $('#email').popover('show');
        }else {
            $(this).attr('data-content','')
            $('#email').popover('hide');
        }
    })

    //基本信息手机号验证
    $('#tel_phone').blur(function(){
        const value = $.trim($('#tel_phone').val());
        var isEmail = /^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/
        if (value.length!=0){
            if (isEmail.test(value)){
                $(this).attr('data-content','')
                $('#tel_phone').popover('hide');
            }else{
                $(this).attr('data-content','请输入正确的手机号')
                $('#tel_phone').popover('show');
            }
        }
    })

    //基本信息姓名验证
    $('#username').blur(function(){
        const value = $.trim($('#username').val());
        if (value.length==0){
            $(this).attr('data-content','姓名不允许为空')
            $('#username').popover('show');
        }else if(value.length>20){
            $(this).attr('data-content','姓名长度不能超过20')
            $('#username').popover('show');
        }else{
            $(this).attr('data-content','')
            $('#username').popover('hide');
        }
    })

    //提交表单
    $('.information_btn').on('click',function () {
        const username = $.trim($('#username').val());
        if (username.length == 0) {
            $('#username').attr('data-content', '姓名不允许为空')
            $('#username').popover('show');
        } else if (username.length > 20) {
            $('#username').attr('data-content', '姓名长度不能超过20')
            $('#username').popover('show');
        } else {
            $('#username').attr('data-content', '')
            $('#username').popover('hide');
        }
        const tel_phone = $.trim($('#tel_phone').val());
        var isEmail = /^1([358][0-9]|4[579]|66|7[0135678]|9[89])[0-9]{8}$/
        if (tel_phone.length != 0) {
            if (isEmail.test(tel_phone)) {
                $('#tel_phone').attr('data-content', '')
                $('#tel_phone').popover('hide');
            } else {
                $('#tel_phone').attr('data-content', '请输入正确的手机号')
                $('#tel_phone').popover('show');
            }
        }
        const email = $.trim($('#email').val());
        var isEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if (email.length!=0){
            if (isEmail.test(email)){
                $('#email').attr('data-content','')
                $('#email').popover('hide');
            }else{
                $('#email').attr('data-content','请输入正确的邮箱')
                $('#email').popover('show');
            }
        }else if (email.length > 50){
            $('#email').attr('data-content','邮箱长度不能超过50')
            $('#email').popover('show');
        }else {
            $('#email').attr('data-content','')
            $('#email').popover('hide');
        }
        var username1 = $('#username').attr('data-content')
        var tel_phone1 = $('#tel_phone').attr('data-content')
        var email1 = $('#email').attr('data-content')
        if (username1.length==0 && tel_phone1.length==0 && email1.length == 0){
            console.log(123123);
        }
    })
})