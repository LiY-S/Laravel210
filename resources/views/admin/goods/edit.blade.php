<<<<<<< Updated upstream
=======
@extends('mutual.admins')

@section('title',$title)

@section('content')
  <script src="/admins/admins/bower_components/jquery/dist/jquery.min.js"></script>
    @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade in" role="alert" id="divs">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <strong>{{session('error')}}</strong>
            </div>
        @endif
    <style type="text/css">
/*a  upload */
        .a-upload {
        margin-top: 8px;
        padding: 4px 10px;
        height: 30px;
        line-height: 20px;
        position: relative;
        cursor: pointer;
        color: #888;
        background: #fafafa;
        border: 1px solid #ddd;
        border-radius: 4px;
        overflow: hidden;
        display: inline-block;
        *display: inline;
        *zoom: 1
        }

        .a-upload  input {
        position: absolute;
        font-size: 100px;
        right: 0;
        top: 0;
        opacity: 0;
        filter: alpha(opacity=0);
        cursor: pointer
        }

        .a-upload:hover {
        color: #444;
        background: #eee;
        border-color: #ccc;
        text-decoration: none
        }
        .col-md-6{
        	margin-left: 400px;
        }
    </style>
    <script type="text/javascript" charset="utf-8" src="/admins/admins/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/admins/admins/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/admins/admins/ueditor/lang/zh-cn/zh-cn.js"></script>
    <div class="col-md-6" style="float: none">
    <div class="content-box">
        <div class="head warning-bg clearfix">
            <h5 class="content-title pull-left">
                商品添加
            </h5>
        </div>
        <div class="content">
            <form class="form-horizontal" action="/admins/goods/{{$res['0']->id}}" method="post"  enctype='multipart/form-data' name="upfile" id="art_form">
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        选择分类
                    </label>
                    <div class="col-sm-10">
                        <select class="form-control selectpicker" name="cate_id">
                        @foreach($cate as $v)
                            @foreach ($res as $val)
                            <option value='{{$v->id}}'  @if($val->cate_id == $v->id) selected @endif>{{$v->cate_name}}</option>
                            @endforeach
                        @endforeach
                        </select>
                    </div>
                </div>
                @foreach ($res as $v)
                <div class="form-group">
                    <label for="inputText" class="col-sm-2 control-label">
                        商品名称
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputText" name="goods_name" value="{{$v->goods_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPlaceholder" class="col-sm-2 control-label">
                        商品价格
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPlaceholder" name="goods_price" value="{{$v->goods_price}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">
                        商品尺码
                    </label>
                    <div class="col-sm-10">
                        <select id="usertype" name="size[]" class="form-control selectpicker" multiple>
                        
                            <option value="36" @if (in_array('36',$v->size)) selected @endif>
                                36
                            </option>
                            <option value="37" @if (in_array('37',$v->size)) selected @endif>
                                37
                            </option>
                            <option value="38" @if (in_array('38',$v->size)) selected @endif>
                                38
                            </option>
                            <option value="39" @if (in_array('39',$v->size)) selected @endif>
                                39
                            </option>
                            <option value="40" @if (in_array('40',$v->size)) selected @endif>
                                40
                            </option>
                            <option value="41" @if (in_array('41',$v->size)) selected @endif>
                                41
                            </option>
                            <option value="42" @if (in_array('42',$v->size)) selected @endif>
                                42
                            </option>
                            <option value="43" @if (in_array('43',$v->size)) selected @endif>
                                43
                            </option>
                            <option value="44" @if (in_array('44',$v->size)) selected @endif>
                                44
                            </option>
                            <option value="45" @if (in_array('45',$v->size)) selected @endif>
                                45
                            </option>
                           
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        商品颜色
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="color" value="{{$v->color}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        商品库存
                    </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputPassword3" name="rid" value="{{$v->rid}}">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">
                        商品展示
                    </label>
                    <div class="col-sm-10">
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="file" name="photo[]" multiple style="margin-top: 10px" id="file_upload">
                            <img src="{{$v->photo['0']}}" alt="" width="80" id="imgs0">
                            <img src="{{$v->photo['1']}}" alt="" width="80" id="imgs1">
                            <img src="{{$v->photo['2']}}" alt="" width="80" id="imgs2">
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label class="col-sm-6 control-label" style="float: none;margin-left: 30px">
                            商品详情
                        </label>
                        <script id="editor" type="text/plain" style="height: 300px" name="repertory">
                             {!!$v->repertory!!}
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">
                        商品状态
                    </label>
                    <div class="col-sm-10" style="margin-top: 11px">
                        <input type="radio" value="1" name="status" @if ($v->status == 1) checked @endif>
                        上架
                        <input type="radio" value="0" name="status" @if ($v->status == 0) checked @endif>
                        下架
                    </div>
                </div>
                @endforeach
                <div class="form-group" style="margin-top:30px">
                    <div class="">
                		{{csrf_field()}}
                        {{method_field('PUT')}}
                        <input type="submit" class="btn-info col-sm-3 col-sm-offset-5" style="border: 0px;border-radius:5px;height: 50px" value="确认修改">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
<script type="text/javascript">
    // alert($);
    $(function () {
        $("#file_upload").change(function () {
            var files = this.files;
            if (files && files.length != 3) {
                alert("请上传三张展示图");
                // console.log(files.length);
                this.value = "" //删除选择
                return;
            }
            var imgPath = $("#file_upload").val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            var formData = new FormData();
            var files = $("#file_upload")[0].files;//等价于document.getElementById("file1").files;
            for(var i = 0; i < files.length; i++){
                formData.append("fileupload[]",files[i]);   // 文件对象 ,fileupload必须加中括号
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "POST",
                url: "/admins/goods/upload",
                data: formData,
                contentType: false,
                processData: false,
                success: function(data) {
                    for (var i = 0; i < data.length; i++) {
                        $('#imgs'+[i]).attr('src',data[i]);
                        var photo = $('<input type="hidden" name="photos[]" value='+data[i]+'>');
                        $('#file_upload').after(photo);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        })
    })
    $('#divs').delay(1000).slideUp(2000);
</script>
@endsection
>>>>>>> Stashed changes
