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

    //提交表单
    $('.information_btn').on('click',function () {
            const username = $.trim($('#username').val());
            if (username.length == 0) {
                $('#username').attr('data-content', '姓名不允许为空')
                $('#username').popover('show');
            } else if (username.length > 20) {
                $('#username').attr('data-content', '姓名长度不能超过20')
                $('#username').popover('show');
                return;
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
                return;
            }
        }else if(tel_phone.length == 0){
            $('#tel_phone').attr('data-content', '姓名不允许为空')
            $('#tel_phone').popover('show');

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
                return;
            }
        }else if (email.length > 50){
            $('#email').attr('data-content','邮箱长度不能超过50')
            $('#email').popover('show');
            return;
        }else if(email.length==0){
            $('#email').attr('data-content', '邮箱不能为空')
            $('#email').popover('show',1);

        }
        if (username.length != 0 && tel_phone.length !=0 && email.length != 0){
            const info =
            console.log(info)

        }


    })
    $('#username').blur(function () {
        $('#username').attr('data-content', '')
        $('#username').popover('hide');
    })
    $('#email').blur(function () {
        $('#email').attr('data-content', '')
        $('#email').popover('hide');
    })
    $('#tel_phone').blur(function () {
        $('#tel_phone').attr('data-content', '')
        $('#tel_phone').popover('hide');
    })
})