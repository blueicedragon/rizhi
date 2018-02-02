/* wifi 测试 */
/* ================================================== */
var wifitime;

function testWifi() {
    var startime = new Date();



    $.ajax({
        url: './Tpl/v20/Public/plugins/wifi/wifi.json',//澶勭悊椤甸潰鍦板潃
        type: 'GET',
        data: {},
        dataType: 'json',
        cache : false,
        timeout:5000,
        error: function(){
            $(".js-wifi").removeClass('strong').removeClass('middle').removeClass('low').addClass('nowifi').find('label').html('<s>网络超时</s>');

        },
        success: function(data){
            var endtime = new Date();
            var wifi = endtime.getTime() - startime.getTime();
            $(".js-wifi").removeClass('strong').removeClass('middle').removeClass('nowifi').removeClass('low');
            if (wifi <= 150) {
                $(".js-wifi").addClass('strong');
            } else if (wifi > 150 && wifi <= 500) {
                $(".js-wifi").addClass('middle');
            } else {
                $(".js-wifi").addClass('low');
            }
            $(".js-wifi").find('label').html('<s>' + wifi + '</s>MS');
        }
    });

    wifitime = setTimeout(function () {
        testWifi();
    }, 10000);
}

testWifi();