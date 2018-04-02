<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')@if(request()->path() !== '/') - {{ $config['WEB_TITLE'] }} @endif</title>
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="author" content="ellison,{{ htmlspecialchars_decode($config['ADMIN_EMAIL']) }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('images/home/favicon.ico') }}">
    {{-- loading style --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/css/loading.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/bootstrap-3.3.5/css/bootstrap-theme.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/css/bjy.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/home/index.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('statics/animate/animate.min.css') }}">
    @yield('css')
</head>
<body>
<!-- 动画 begin -->
<div class="spinner">
    <div class="spinner-container container1">
        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>
        <div class="circle4"></div>
    </div>
    <div class="spinner-container container2">
        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>
        <div class="circle4"></div>
    </div>
    <div class="spinner-container container3">
        <div class="circle1"></div>
        <div class="circle2"></div>
        <div class="circle3"></div>
        <div class="circle4"></div>
    </div>
</div>
<!-- 动画 end -->
<!-- 顶部导航开始 -->
<header id="b-public-nav" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/blog') }}" onclick="recordId('/',0)">
                <div class="hidden-xs b-nav-background"></div>
                <ul class="b-logo-code">
                    {{--<li class="b-lc-start">&lt;?php</li>--}}
                    {{--<li class="b-lc-echo">echo</li>--}}
                </ul>
                <p class="b-logo-word" style="color: #0084AF;font-weight: bold;"> 🍁 {{ $config['WEB_NAME'] }}</p>
                <p class="b-logo-end">&nbsp;&nbsp;</p>
            </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav b-nav-parent">
                <li class="hidden-xs b-nav-mobile"></li>
                <li class="b-nav-cname  @if($category_id == 'index') b-nav-active @endif">
                    <a href="{{ url('blog') }}" onclick="recordId('/',0)">首页</a>
                </li>
                @foreach($category as $v)
                    <li class="b-nav-cname @if($v->id == $category_id) b-nav-active @endif">
                        <a href="{{ url('blog/category/'.$v->id) }}" onclick="return recordId('cid', '{{ $v->id }}')">{{ $v->name }}</a>
                    </li>
                @endforeach
                <li class="b-nav-cname @if($category_id == 'chat') b-nav-active @endif">
                    <a href="{{ url('blog/chat') }}">随言碎语</a>
                </li>
                @if(!$gitProject->isEmpty())
                    <li class="b-nav-cname hidden-sm  @if($category_id == 'git') b-nav-active @endif">
                        <a href="{{ url('blog/git') }}">开源项目</a>
                    </li>
                @endif
            </ul>
            <ul id="b-login-word" class="nav navbar-nav navbar-right">
                @if(empty(session('user.name')))
                    <li class="b-nav-cname b-nav-login">
                        <div class="hidden-xs b-login-mobile"></div>
                        <a href="javascript:;" onclick="login()">登录</a>
                    </li>
                @else
                    <li class="b-user-info">
                        <span><img class="b-head_img" style="border-radius: 50%;" src="{{ session('user.avatar') }}" alt="{{ session('user.name') }}" title="{{ session('user.name') }}" /></span>
                        <span class="b-nickname">{{ session('user.name') }}</span>
                        <span><a href="{{ url('blog/auth/oauth/logout') }}">退出</a></span>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</header>
<!-- 顶部导航结束 -->

<div class="b-h-70"></div>

<div id="b-content" class="container" style="display: none;">
    <div class="row">
    @yield('content')
    <!-- 通用右部区域开始 -->
        <div id="b-public-right" class="col-lg-4 hidden-xs hidden-sm hidden-md">
            @if(!empty($config['QQ_QUN_NUMBER']))
                <div class="b-tags">
                    <h4 class="b-title">加入组织</h4>
                    <ul class="b-all-tname">
                        <li class="b-qun-or-code">
                            <img src="{{ asset($config['QQ_QUN_OR_CODE']) }}" alt="QQ" style="width: 140px;">
                        </li>
                        <li class="b-qun-word">
                            <p class="b-qun-nuber">
                                1. 手 Q 扫左侧二维码
                            </p>
                            <p class="b-qun-nuber">
                                2. 搜群：{{ $config['QQ_QUN_NUMBER'] }}
                            </p>
                            <p class="b-qun-code">
                                3. 点击 {!! $config['QQ_QUN_CODE'] !!}
                            </p>
                            <p class="b-qun-article">
                                @if(!empty($qqQunArticle['id']))
                                    <a href="{{ url('blog/article', [$qqQunArticle['id']]) }}" target="_blank">{{ $qqQunArticle['title'] }}</a>
                                @endif
                            </p>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="b-tags">
                <h4 class="b-title">热门标签</h4>
                <ul class="b-all-tname">
                    <?php $tag_i = 0; ?>
                    @foreach($tag as $v)
                        <?php $tag_i++; ?>
                        <?php $tag_i = $tag_i == 5 ? 1 : $tag_i; ?>
                        <li class="b-tname">
                            <a class="tstyle-{{ $tag_i }}" href="{{ url('blog/tag', [$v->id]) }}" onclick="return recordId('tid','{{ $v->id }}')">{{ $v->name }}
                                ({{ $v->articles_count }})</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="b-recommend">
                <h4 class="b-title">置顶推荐</h4>
                <p class="b-recommend-p">
                    @foreach($topArticle as $v)
                        <a class="b-recommend-a" href="{{ url('blog/article', [$v->id]) }}" target="_blank"><span class="fa fa-th-list b-black"></span> {{ $v->title }}
                        </a>
                    @endforeach
                </p>
            </div>
            <div class="b-link">
                <h4 class="b-title">最新评论</h4>
                <div>
                    @foreach($newComment as $v)
                        <ul class="b-new-comment @if($loop->first) b-new-commit-first @endif">
                            <img class="b-head-img js-head-img" src="{{ asset('uploads/avatar/default.jpg') }}" _src="{{ asset($v->avatar) }}" alt="{{ $v->name }}">
                            <li class="b-nickname">
                                {{ $v->name }}<span>{{ word_time($v->created_at) }}</span>
                            </li>
                            <li class="b-nc-article">
                                在<a href="{{ url('blog/article', [$v->article_id]) }}" target="_blank">{{ $v->title }}</a>中评论
                            </li>
                            <li class="b-content">
                                {!! $v->content !!}
                            </li>
                        </ul>
                    @endforeach
                </div>
            </div>
            <eq name="show_link" value="1">
                <div class="b-link">
                    <h4 class="b-title">友情链接</h4>
                    <p>
                        @foreach($friendshipLink as $v)
                            <a class="b-link-a" href="{{ $v->url }}" target="_blank"><span class="fa fa-link b-black"></span> {{ $v->name }}
                            </a>
                        @endforeach
                    </p>
                </div>
            </eq>
            <div class="b-search">
                <form class="form-inline" role="form" action="{{ url('blog/search') }}" method="get">
                    <input class="b-search-text" type="text" name="wd">
                    <input class="b-search-submit" type="submit" value="全站搜索">
                </form>
            </div>
        </div>
        <!-- 通用右部区域结束 -->
    </div>

    {{--<div class="row">--}}
    {{--<!-- 通用底部文件开始 -->--}}
    {{--<footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12">--}}
    {{--<ul>--}}
    {{--<li class="text-center">--}}
    {{--本博客使用免费开源的 <a rel="nofollow" href="https://github.com/ellison/laravel-bjyblog" target="_blank">laravel-bjyblog</a> {{ config('bjyblog.version') }} 搭建 © 2014-2018 {{ parse_url(config('app.url'))['host'] }} 版权所有 @if(!empty($config['WEB_ICP_NUMBER'])) ICP证：{{ $config['WEB_ICP_NUMBER'] }} @endif--}}
    {{--</li>--}}
    {{--<li class="text-center">--}}
    {{--@if(!empty($config['ADMIN_EMAIL']))--}}
    {{--联系邮箱：{!! $config['ADMIN_EMAIL'] !!}--}}
    {{--@endif--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--<div class="b-h-20"></div>--}}
    {{--<a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a>--}}
    {{--</footer>--}}
    {{--<!-- 通用底部文件结束 -->--}}
    {{--</div>--}}

</div>
<!-- 主体部分结束 -->

<footer id="b-foot" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background-color: #333333;display: none;">
    <ul style="color: white;max-width: 1170px;margin: 0 auto;">
        <li class="text-center" style="margin-top: 50px;margin-bottom: 50px;float: left;width: 40%;">
            {{--<p style="padding-top: 30px;">--}}
                {{--本博客使用免费开源的 <a rel="nofollow" href="https://github.com/ellison/laravel-bjyblog" target="_blank">laravel-bjyblog</a> {{ config('bjyblog.version') }}--}}
                {{--搭建 © 2014-2018 {{ parse_url(config('app.url'))['host'] }} 版权所有 @if(!empty($config['WEB_ICP_NUMBER'])) ICP证：{{ $config['WEB_ICP_NUMBER'] }} @endif--}}
            {{--</p>--}}

            @if(!empty($config['ADMIN_EMAIL']))
                <p style="width: 100%;text-align: left;color: #9d9d9d;font-size: 14px;">
                    本博客主要用于分享日常学习、生活及工作的一些心得总结, 文章源自网络, 如涉及您的利益请联系管理员删除, 联系邮箱：{!! $config['ADMIN_EMAIL'] !!}
                </p>
                <p style="width: 100%;text-align: left;padding-top: 10px;font-size: 20px;">
                    <a class="popover-with-html" data-content="反馈问题" target="_blank" style="padding-right: 8px;color: #9d9d9d;" href="mailto:ruoxiaozh@163.com" data-original-title="" title=""><i class="fa fa-envelope" aria-hidden="true"></i></a>
                    <a class="popover-with-html" data-content="加我 QQ" target="_blank" style="padding-right: 8px;color: #9d9d9d;" href="http://wpa.qq.com/msgrd?v=3&uin=1831152062&site=qq&menu=yes" data-original-title="" title=""><i class="fa fa-qq" aria-hidden="true"></i></a>
                    {{-- <a class="popover-with-html" data-content="加我微信" target="_blank" style="padding-right: 8px;color: #9d9d9d;" href="https://laravel-china.org/contact" data-original-title="" title=""><i class="fa fa-weixin" aria-hidden="true"></i></a> --}}
                </p>
                <p style="width: 100%;text-align: left;padding-top: 10px;color:#9d9d9d;">
                    Owned By 🍁 Ellison &nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- 百度统计开始 -->
                    <style>
                        footer a {
                            color: #9d9d9d;
                        }
                    </style>
                    {!! htmlspecialchars_decode($config['WEB_STATISTICS']) !!}
                    <!-- 百度统计结束 -->
                </p>
            @endif
        </li>

        <li class="text-center" style="margin-top: 50px;margin-bottom: 50px;float: left;width: 15%;">
            <div>
                <img src="{{ asset('images/home/wechat.png') }}" alt="" style="width: 60%;margin-left: 20%;">
            </div>
        </li>

        <li class="text-center" style="margin-top: 50px;margin-bottom: 50px;float: right;width: 45%;">
            <p style="width: 100%;text-align: left;padding-left: 8%;color: #9d9d9d;text-indent: 2em;font-size: 14px;">
                有时候，需要回过头思忖一会儿才能把走过的路看清楚，于是惊异于它脉络的清晰。你可以从偶然性看到必然性，又得出性格决定命运、命运影响性格的结论。只是大多数时候，我们是行者，以不同的姿态走过人生，虽然时而回头看清来时的路，却未必能看懂归途。
            </p>
        </li>

        <li style="clear: both;"></li>

    </ul>

    {{--<div class="b-h-20"></div>--}}
    <a class="go-top fa fa-angle-up animated jello" href="javascript:;" onclick="goTop()"></a>
</footer>

<!-- 登录模态框开始 -->
<div class="modal fade" id="b-modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content row">
            <div class="col-xs-12 col-md-12 col-lg-12">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title b-ta-center" id="myModalLabel">无需注册，用以下帐号即可直接登录</h4>
                </div>
            </div>
            <div class="col-xs-12 col-md-12 col-lg-12 b-login-row">
                <ul class="row" style="display: flex;justify-content: center;">
                    @if(!empty($config['QQ_APP_ID']))
                        <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                            <a href="{{ url('blog/auth/oauth/redirectToProvider/qq') }}"><img src="{{ asset('images/home/qq-login.png') }}" alt="QQ登录" title="QQ登录"></a>
                        </li>
                    @endif

                    @if(!empty($config['SINA_API_KEY']))
                        <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                            <a href="{{ url('blog/auth/oauth/redirectToProvider/weibo') }}"><img src="{{ asset('images/home/sina-login.png') }}" alt="微博登录" title="微博登录"></a>
                        </li>
                    @endif

                    @if(!empty($config['GITHUB_CLIENT_ID']))
                        <li class="col-xs-6 col-md-4 col-lg-4 b-login-img">
                            <a href="{{ url('blog/auth/oauth/redirectToProvider/github') }}"><img src="{{ asset('images/home/github-login.jpg') }}" alt="github登录" title="github登录"></a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- 登录模态框结束 -->
<script src="{{ asset('statics/js/jquery-2.0.0.min.js') }}"></script>
<script>
    // 加载完成之后移除掉
    window.onload = function() {
        $('.spinner').remove(); // 或者直接通过 display: none; 来隐藏
        $('#b-content').css('display', 'block');
        $('#b-foot').css('display', 'block');
    }
</script>
<script>
    logoutUrl = "{:U('Home/User/logout')}";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{ asset('statics/bootstrap-3.3.5/js/bootstrap.min.js') }}"></script>
<!--[if lt IE 9]>
<script src="{{ asset('statics/js/html5shiv.min.js') }}"></script>
<script src="{{ asset('statics/js/respond.min.js') }}"></script>
<![endif]-->
<script src="{{ asset('statics/pace/pace.min.js') }}"></script>
<script src="{{ asset('js/home/index.js') }}"></script>
<!-- 百度页面自动提交开始 -->
<script>
    (function () {
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
<!-- 百度页面自动提交结束 -->

@yield('js')
</body>
</html>
