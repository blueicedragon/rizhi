$(document).ready(function(){

                $("button.del_Img").click(function () {
                    var obj = $(this);
                    $.ajax({
                        url: './index.php?m=Public&a=imgdel',
                        type: 'POST',
                        data: {'img': $(obj).siblings(".imgValue").val()},
                        dataType: 'json',
                        //timeout: 1000,
                        error: function () {
                            //alert('Error loading XML document');
                        },
                        success: function (data){
                            $(obj).siblings('button.up_Img').show();
                            $(obj).hide();
                            $(obj).siblings("input.imgValue").attr("value", '');
                            $(obj).siblings('img.upload_thumb').hide();
                        }
                    });
                });


            $(document).on('change','.file',function(){
                var obj1 = $(this).siblings('input.imgValue');

                $.ajaxFileUpload({
                            url:'/Public/doajaxfileupload.php?name=' + $(this).attr("name"),
                            secureuri:false,
                            fileElementId:$(this).attr('id'),
                            dataType: 'json',
                            success: function (data, status){
                                if(typeof(data.error) != 'undefined'){
                                    if(data.error != ''){
                                        alert(data.error);
                                    }else{
                                        $(obj1).siblings('button.del_Img').show();
                                        $(obj1).attr("value",data.msg);
                                        $(obj1).siblings('.upload_thumb').show().attr('src',Public + data.msg);
                                    }
                                }
                            },
                            error: function (data, status, e){
                                alert(e);
                            }
                        }
                )
            })
    //缩率图 放大
    $('img.upload_thumb').hover(function(){
        $(this).siblings('.upload_big').attr('src',$(this).attr('src')).show();
    },function(){
        $(this).siblings('.upload_big').hide();
    });
    ////
});