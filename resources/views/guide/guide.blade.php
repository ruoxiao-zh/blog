<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Ellison`s Web!</title>
    <link rel="shortcut icon" href="https://www.ruoxiaozh.com/images/home/favicon.ico">
    <link rel="stylesheet" href="{{ asset('/statics/guide/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('/statics/guide/guide.css') }}">
    <script>
        // 检测访问页面
        if (/AppleWebKit.*mobile/i.test(navigator.userAgent) || (/MIDP|SymbianOS|NOKIA|SAMSUNG|LG|NEC|TCL|Alcatel|BIRD|DBTEL|Dopod|PHILIPS|HAIER|LENOVO|MOT-|Nokia|SonyEricsson|SIE-|Amoi|ZTE/.test(navigator.userAgent))) {
            if (window.location.href.indexOf("?mobile") < 0) {
                try {
                    if (/Android|webOS|iPhone|iPod|BlackBerry/i.test(navigator.userAgent)) {
                        // 手机页面
                        window.location.href = "{{ url('blog') }}";
                    } else if (/iPad/i.test(navigator.userAgent)) {
                        // 平板页面
                        window.location.href = "{{ url('blog') }}";
                    } else {
                        // 其它移动端页面
                        window.location.href = "{{ url('blog') }}"
                    }
                } catch (e) {
                }
            }
        }
    </script>
</head>
<body>
{{--canves 动画 begin--}}
<div id="particles-js"></div>
{{--canves 动画 end--}}

<div class="page-content">
    <div class="avatar-header">
        <img class="img-circle" src="{{ asset('/statics/guide/my-avatar.png') }}" alt="ellison`s avatar">
    </div>
    <div class="description">
        Become A Better Engineer.
    </div>
    <div class="links">
        <a href="{{ url('/blog') }}">Blog</a>
        <a href="https://github.com/ruoxiao-zh" target="_blank">GitHub</a>
        <a href="https://laravel-china.org/users/14250" target="_blank">Laravel China</a>
        <a href="https://www.jianshu.com/u/80ea0a768c26" target="_blank">JianShu</a>
        <a href="/about">Me</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="{{ asset('/statics/guide/demo.js') }}"></script>

<ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
</ul>

{{--background music begin--}}
<audio style="display:none; height: 0" id="bg-music" loop="loop" preload="auto" src="{{ asset('statics/guide/liulang.mp3') }}">
    你的浏览器不支持 audio 标签
</audio>
{{--background music end--}}

</body>
<script>
    // 打开页面自动播放背景音乐
    document.addEventListener('DOMContentLoaded', function () {
        function audioAutoPlay() {
            var audio = document.getElementById('bg-music');
            audio.play();
            document.addEventListener('WeixinJSBridgeReady', function () {
                audio.play();
            }, false);
        }

        audioAutoPlay();
    });
</script>
</html>
