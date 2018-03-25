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

    //提交个人信息内容
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
            $('#tel_phone').attr('data-content', '电话不允许为空')
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
            const re_id = $('#re_id').val();
            const url = $('#info_add_url').val();
            const data = new FormData($('#information_data')[0])
            $.ajax({
                url:url +'/'+ re_id,
                cache:false,
                data:data,
                type:'post',
                contentType:false,
                processData:false,
                success:function (data) {
                    if (data.state ==200){
                        layer.msg(data.msg, {icon:1})
                        setTimeout(function () {
                            location.href=location.href
                        },1000)
                    }
                }
            })
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

    //提交求职意向
    $('.btn-intention').on('click',function () {
        const money = $.trim($('#money').val());
        if (money.length == 0) {
            $('#money').attr('data-content', '必填')
            $('#money').popover('show');
        } else if (money.length > 10) {
            $('#money').attr('data-content', '不能超过10位')
            $('#money').popover('show');
            return;
        }
        const city = $.trim($('#city').val());
        if (city.length == 0) {
            $('#city').attr('data-content', '必填')
            $('#city').popover('show');
        } else if (city.length > 8) {
            $('#city').attr('data-content', '不能超过8位')
            $('#city').popover('show');
            return;
        }
        if (money.length != 0 && city.length !=0){
            const info_id = $('#intention_info_id').val();
            const inten_id = $('#intention_inten_id').val();
            const url = $('#intention_url').val();
            const data = new FormData($('#intention_data')[0])
            $.ajax({
                url:url +'/'+info_id+'/'+ inten_id,
                cache:false,
                data:data,
                type:'post',
                contentType:false,
                processData:false,
                success:function (data) {
                    if (data.state ==200){
                        layer.msg(data.msg, {icon:1})
                        setTimeout(function () {
                            location.href=location.href
                        },1000)
                    }
                    if (data.state ==100){
                        layer.msg(data.msg, {icon:2})
                    }
                }
            })
        }
    })
    $('#money').blur(function () {
        $('#money').attr('data-content', '')
        $('#money').popover('hide');
    })
    $('#city').blur(function () {
        $('#city').attr('data-content', '')
        $('#city').popover('hide');
    })

    //个人技能
    $('.skill_btn').on('click',function () {
        const skill_text = $.trim($('#skill_text').val());
        if (skill_text.length == 0) {
            $('#skill_text').attr('data-content', '必填')
            $('#skill_text').popover('show');
        } else if (skill_text.length > 800) {
            $('#skill_text').attr('data-content', '不能超过800位')
            $('#skill_text').popover('show');
            return;
        }
        if (skill_text.length != 0){
            const info_id = $('#skill_info_id').val();
            const sk_id = $('#skill_sk_id').val();
            const url = $('#skill_url').val();
            const data = new FormData($('#skill_data')[0])
            $.ajax({
                url:url +'/'+info_id+'/'+ sk_id,
                cache:false,
                data:data,
                type:'post',
                contentType:false,
                processData:false,
                success:function (data) {
                    if (data.state ==200){
                        layer.msg(data.msg, {icon:1})
                        setTimeout(function () {
                            location.href=location.href
                        },1000)
                    }
                    if (data.state ==100){
                        layer.msg(data.msg, {icon:2})
                    }
                }
            })
        }
    })
    $('#skill_text').blur(function () {
        $('#skill_text').attr('data-content', '')
        $('#skill_text').popover('hide');
    })
    
    //个人评价
    $('.evaluate_btn').on('click',function () {
        const text_evaluate = $.trim($('.text_evaluate').val());
        if (text_evaluate.length == 0) {
            $('.text_evaluate').attr('data-content', '必填')
            $('.text_evaluate').popover('show');
        } else if (text_evaluate.length > 800) {
            $('.text_evaluate').attr('data-content', '不能超过300位')
            $('.text_evaluate').popover('show');
            return;
        }
        if (skill_text.length != 0){
            const info_id = $('#eval_info_id').val();
            const eva_id = $('#eval_eva_id').val();
            const url = $('#eval_url').val();
            const data = new FormData($('#evaluate_data')[0])
            $.ajax({
                url:url +'/'+info_id+'/'+ eva_id,
                cache:false,
                data:data,
                type:'post',
                contentType:false,
                processData:false,
                success:function (data) {
                    if (data.state ==200){
                        layer.msg(data.msg, {icon:1})
                        setTimeout(function () {
                            location.href=location.href
                        },1000)
                    }
                    if (data.state ==100){
                        layer.msg(data.msg, {icon:2})
                    }
                }
            })
        }
    })
    $('.text_evaluate').blur(function () {
        $('.text_evaluate').attr('data-content', '')
        $('.text_evaluate').popover('hide');
    })
})