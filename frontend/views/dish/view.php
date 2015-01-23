<!DOCTYPE html>
<html lang="en">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta charset="utf-8" />
    <meta content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width" name="viewport" />
    <meta content="yes" name="apple-mobile-web-app-capable" />
    <meta content="black" name="apple-mobile-web-app-status-bar-style" />
    <meta content="telephone=no" name="format-detection" />
    <meta name="keywords" content="麻库,烹小鲜,小龙虾,麻小,麻辣,香辣,皮皮虾,大闸蟹,馋嘴蛙,花螺,大花螺" />
    <meta name="description" content="享乐有道 麻库烹小鲜" />
    <title>麻辣香肠(农家土猪自制)全国包邮- 麻库 </title>

    <link href="http://mk.drox.cn/Content/css/style.css?v=586" rel="stylesheet"/>


    <link href="http://mk.drox.cn/Content/css/style_pc.css" rel="stylesheet" />
</head>
<body>
<script type="text/javascript" src="http://mk.drox.cn/content/js/jquery-1.8.2.min.js"></script>
<script>

    $(document).ready(function () {

        if (document.addEventListener) {
            document.addEventListener('WeixinJSBridgeReady', onBridgeReady, false);
        } else if (document.attachEvent) {
            document.attachEvent('WeixinJSBridgeReady', onBridgeReady);
            document.attachEvent('onWeixinJSBridgeReady', onBridgeReady);
        }

        $(document).ajaxStart(function () {
            $("#loadingdiv").css("display","block");
        }).ajaxStop(function () {
            $("#loadingdiv").css("display", "none");
        });
    });

    var dataForWeixin = {
        appId: "wx9f74e125fd3532ec",
        MsgImg: "http://mk.drox.cn/content/images/logo.jpg",
        TLImg: "http://mk.drox.cn/content/images/logo.jpg",
        url: "http://mk.drox.cn",
        title: "麻库烹小鲜",
        desc: "麻库，超赞的麻辣小龙虾",
        callback: function (res, shareto, url) { sharelog(shareto, url); }
    };

    function sharelog(shareto, url) {
        $.ajax({
            type: "POST",
            url: "/w/ajaxsharelog",
            data: "sharetype=" + shareto + "&url=" + url ,
            success: function (r) {
            }
        });
    }


    var onBridgeReady = function () {
        //发送给朋友
        WeixinJSBridge.on('menu:share:appmessage', function (argv) {
            WeixinJSBridge.invoke('sendAppMessage', {
                "appid": dataForWeixin.appId,
                "img_url": dataForWeixin.MsgImg,
                "img_width": "200",
                "img_height": "200",
                "link": dataForWeixin.url,
                "desc": dataForWeixin.desc,
                "title": dataForWeixin.title
            }, function (res) { (dataForWeixin.callback)(res, "appmessage", dataForWeixin.url); });
        });
        //发送到朋友圈
        WeixinJSBridge.on('menu:share:timeline', function (argv) {

            WeixinJSBridge.invoke('shareTimeline', {
                "img_url": dataForWeixin.TLImg,
                "img_width": "200",
                "img_height": "200",
                "link": dataForWeixin.url,
                "desc": dataForWeixin.desc,
                "title": dataForWeixin.desc
            }, function (res) { (dataForWeixin.callback)(res, "timeline", dataForWeixin.url); });
        });
    };

</script>
<div id="loadingdiv" style="display:none; width:100%;height:100%;position:fixed;top:0;left:0;background:#010101;opacity:.1;-webkit-transform:translate3d(0, 0, 0);z-index:99">

</div>



<div class="wrap">
    <div class="content-main">

        <!--轮播-->
        <div class="in_con">
            <div id="in_slider" class="in_slider">
                <div>            <div style="display: block">
                        <a href="javascript:void(0);">
                            <img src="http://mk.drox.cn/upload/35c861878bd84073b43984313ee8559d.jpg" /></a>
                    </div>        </div>
            </div></div>
        <!--轮播 end-->
        <div class="adaptive clearfix">
            <div class="adaptive_l"><h2>麻辣香肠(农家土猪自制)全国包邮</h2>农家土猪 古法烹制</div>
            <div class="adaptive_r">￥<span>49.00</span></div>
        </div>
        <div class="unit_price"><a href="javascript:;" class="promptly">立即订餐</a></div>
        <div class="product_con">
            <div><img src="http://admin.drox.cn/upload/resource/741f1d3e7b0243f998a47219965167df.png"></div><div><br></div><div><br></div><img src="http://admin.drox.cn/upload/resource/a7683527bee14c2caf8c65b2cfbd56ba.jpg"><img src="http://admin.drox.cn/upload/resource/4965c20ef8db4358a372826e65b45aa0.jpg"><img src="http://admin.drox.cn/upload/resource/f0400b79654e4ac7bfe0fc1d7ecb3cfd.jpg"><img src="http://admin.drox.cn/upload/resource/77ccc0b4f9cc48289ceb62d3b680bb06.jpg"><img src="http://admin.drox.cn/upload/resource/5d90b41c95824d57ba60e4292c548f82.jpg"><img src="http://admin.drox.cn/upload/resource/d3a4f33e856f49ea98b812c63d1126fe.jpg"><img src="http://admin.drox.cn/upload/resource/9f928e9f71c74597b8a77f757abae72a.jpg"><img src="http://admin.drox.cn/upload/resource/d17062d1a2da47988d425810489b29ee.jpg"><img src="http://admin.drox.cn/upload/resource/384a52a187864e4090f2b573f42dd78b.jpg"><img src="http://admin.drox.cn/upload/resource/51778e9ba4e94b6e97373db6283e4ec6.jpg"><img src="http://admin.drox.cn/upload/resource/2014ff980a7545b59efbe4abda3130a7.jpg">
        </div>

    </div>
    <div class="content-right">

        <div class="sidebar_info">
            <h3><a href="/"><img src="http://mk.drox.cn/content/images/web_tit.png" width="150" /></a></h3>

            <p class="weixin_h">微信“扫一扫”关注购买</p>

            <p class="text_c">
                <img width="158" height="158" src="http://mk.drox.cn/content/images/qrcode.jpg">
            </p>
            <p class="weixin_h_t">微信号：makumx</p>
        </div>

    </div>
</div>


<script>
    $(document).ready(function () {
        $('.promptly').click(function () {
            $('.sidebar_info').addClass('active shake');
            setTimeout(function () { $(".sidebar_info").removeClass('shake') }, 1200);
        })
    })
</script>
<script type="text/javascript">
    var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
    document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fe7cc9d2fdfaf0fcd5c60d513d2f1c5cb' type='text/javascript'%3E%3C/script%3E"));
</script>
</body>
</html>