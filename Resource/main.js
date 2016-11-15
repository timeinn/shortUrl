/**
 * Project: Short URL
 * Author: Sendya <18x@loacg.com>
 * Date: 2016/11/16 12:08:13
 */

jQuery(function($) {
    $("#submit").off().on('click', function() {
        var urlVal = $("#url").val();
        if(urlVal =='' || urlVal == null) {
            showTip('<b style="color: #f00">不能转换空链接</b>');
            return;
        }
        $.ajax({
            url: "/short/alias.json",
            data: {url: urlVal},
            dataType: "json",
            success: function(result){
                if(result.code == 200 && result.data.error == 0){
                    var shortURL = "{BASE_URL}" + result.data.alias;
                    $("#short_url").show().html('短址为：<a href="'+ shortURL + '" target="_blank">'+shortURL+'</a>');
                    showTitleTip('网址已压缩');
                } else {
                    if (result.data.alias != undefined) {
                        var shortURL = "{BASE_URL}" + result.data.alias;
                        $("#short_url").show().html('<br/>短址为：<a href="'+ shortURL + '" target="_blank">'+shortURL+'</a>');
                    }
                    if (result.data.message != '') {
                        alert(result.data.message);
                    }
                }
            },
            error: function(jqXHR, statusText){
                showTip('<b style="color: #f00">请求服务器出现错误</b>');
                console.log(statusText);
            }
        });
    });

    function showTitleTip(title) {
        var old_title = $(".title").html();
        $(".title").html(title);
        setTimeout(function () {
            $(".title").html(old_title);
        }, 3000);
    }
    function showTip(title) {
        var old_title = $("#short_url").html();
        $("#short_url").html(title);
        setTimeout(function () {
            $("#short_url").html(old_title);
        }, 3000);
    }
});