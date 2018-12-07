@extends('mutual.homes')


@section('title', $title)


@section('content');


<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
            <li class="active">个人中心</li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<!-- mail -->
<div class="mail animated wow zoomIn" data-wow-delay=".5s">
    <div class="container">
        <h3>忘记密码</h3>
        <p class="est">********************</p>
        <div class="mail-grids">
            <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s" style="margin-left: 380px;">
                <form id='art_form' action="/home/dowjmm" method="post" class="mws-form" enctype="multipart/form-data">
                    手&nbsp; 机&nbsp; 号:<input type="text" name="phone" required="" style="width:300px;"><span></span><br><br><br>
                    验 &nbsp;证&nbsp; 码:<input type="text" name="code" style="width:135px;" required="">&nbsp;&nbsp;&nbsp;&nbsp;<a id="but" class="btn btn-default" style="height:40px; width: 150px; background-color: #eee;">点击获取验证码</a><br>
                    <span id="spans" style="margin-left: 80px;"></span>
                    {{csrf_field()}}
                    <br>
                    <br>
                    <input style="margin-left: 50px;" type="submit" value="提交" >
                </form>
            </div>
            <div class="clearfix"> </div>
            <br>
            <br>
            <br>
            <br>
        </div>
    </div>
</div>
<!-- //mail -->

@stop

@section('js')

<script>
    var CV = true;
    var PH = true;
        $('input[name=phone]').focus(function(){
            $(this).css('border','solid 1px orange');
        });
        // 验证手机号是否已经被注册
        $('input[name=phone]').blur(function(){
            var phone = $(this).val().trim();
            if(phone == ''){
                $(this).css('border','solid 1px red');
                PH = false;
                return;
            }
            var pho = $(this);
            var reg = /^1[3456789]\d{9}$/;
            if(!reg.test(phone)){
                $(this).css('border','solid 1px red');
                PH = false;
            } else {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // 发送ajax验证手机号是否已经被注册
                $.post('/home/wjmmphone',{phone:phone},function(data){
                    // console.log(data);
                    if (data == '0') {
                        pho.css('border','solid 1px red');
                        pho.next().text('手机号未注册').css('color','red');
                        PH = false;
                        return;
                    }
                });
                $(this).css('border','');
                $(this).next().text('');
                PH = true;
            }
        });
        //获取验证码
        $('#but').click(function(){
            // post要使用的请求头
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var phv = $('input[name=phone]').val().trim();
            //发送ajax
            if (phv == '') {
                return;
            }
            // console.log(phv);
            $.post('/home/wjmmajax',{phone:phv},function(data){
                // console.log(data);
            })
        });
        //获取验证码
        $('input[name=code]').focus(function(){
            // $(this).addClass('cur');
            $(this).css('border','solid 1px orange');
            $('#spans').text(' *请输入手机上获取到的验证码').css('color','#111');

        })

        $('input[name=code]').blur(function(){
            ///获取验证码
            var cd = $(this).val().trim();


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            if(cd == ''){
                $('#spans').text(' *验证码不能为空').css('color','#e53e41');

                $(this).css('border','solid 1px #e53e41');

                CV = false;
                return;
            } else {
                $('#spans').text(' ').css('color',' ');

                $(this).css('border','solid 1px #fff');
            }
            var cs = $(this);
            //发送ajax
            $.post('/home/wjmmcheck',{code:cd},function(data){
                // console.log(data);
                if(data == '0'){
                    $('#spans').text(' *验证码不正确').css('color','#e53e41');
                    cs.css('border','solid 1px #e53e41');
                    CV = false;
                } else {
                    $('#spans').text(' ').css('color',' ');
                    cs.css('border','solid 1px #ccc');
                    CV = true;
                }
            })
        });
        $('#art_form').submit(function(){

            $('input[name=phone]').trigger('blur');
            $('input[name=code]').trigger('blur');

            if(CV && PH){

                return true;
            }
            //var flag = 1   var flag = 0
            return false;
        });
</script>
<script>
    $('#but').click(function(){
        var phv = $('input[name=phone]').val().trim();
        if (phv == '') {
            return;
        } else {
            var i = 60;
            var but = $(this);

            var info = setInterval(function(){
                but.text('');
                i--;
                if (i > 0) {
                    but.text(i+'秒');
                    but.attr('disabled','disabled');
                } else {
                    clearInterval(info);
                    but.text('点击重新获取验证码');
                    but.removeAttr('disabled');
                }
            },1000);
        }
    });


</script>


@stop