<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{ asset('images/home/favicon.ico') }}">
    <title>404页面-{{ $config['WEB_NAME'] }}</title>
    <style>
        #box{
            margin: 0 auto;
            width: 100%;
            height: 540px;
        }
        p{
            margin-bottom: 60px;
            width: 100%;
            height: 20px;
            text-align: center;
            line-height: 20px;
        }
        #mes{
            font-size: 30px;
            color: red;
        }
        .hint{
            color: #999;
        }
        a{
            color: #259AEA;
        }
    </style>
    <script>
        var i = 5;
        var intervalid;
        intervalid = setInterval("fun()", 1000);
        function fun() {
            if (i === 0) {
                window.location.href = "/blog";
                clearInterval(intervalid);
            }
            document.getElementById("mes").innerHTML = i;
            i--;
        }
    </script>
</head>
<body>
<div id="box">
    {{--<img src="{{ asset('images/home/404.jpg') }}" alt="404">--}}
    <p style="margin-top: 300px;color: #999; font-size: 32px;">Sorry, the page you are looking for could not be found.</p>
    <p>将在 <span id="mes">5</span> 秒钟后返回<a href="/">{{ $config['WEB_NAME'] }}</a>首页</p>
    <p class="hint">非常抱歉 - 您可能输入了错误的网址，或者该网页已删除或移动</p>
</div>
</body>
</html>