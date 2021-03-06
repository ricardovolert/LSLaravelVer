<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <title>@yield('title') | 洛嬉遊戲 L.S. Games</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="洛嬉遊戲 L.S. Games LSGames lsgames" />
    {{-- CSRF Token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="web-root" content="{{ URL::to('/') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script type="text/javascript" src="{{ asset('js/jquery-2.2.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/PreloadJS.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style type="text/css">
        /* Loading Screen */
        .loadscr {
            position: absolute;
            top: 0;
            left: 0;
            display: block;
            width: 100vw;
            height: 100vh;
            background-color: rgb(196, 134, 0);
            z-index: 999;
        }

        .loadscr .progress {
            width: 50%;
            margin: 15px auto;
        }

        .progress-bar {
            text-align: right !important;
        }

        .progress-bar > span {
            font-weight: bold;
            font-size: 1.2em;
            text-shadow: 0px 0px 5px #7fbbf1, 0px 0px 5px #7fbbf1, 0px 0px 5px #7fbbf1, 0px 0px 5px #7fbbf1, 0px 0px 5px #7fbbf1;
        }

        .loadscr .loadTitle {
            font-size: 3.5em;
            color: white;
            text-align: center;
            width: 100vw;
            padding-top: 30vh;
        }

        .loadscr .logo {
            width: 1.7em;
        }

        .loadscr .loadHint {
            width: 100%;
            text-align: center;
            font-size: 1.1em;
            color: white;
        }

        .pageWrap {
            display: none;
        }

        #progBar {
            width: 45%;
        }

        .sr-only {
            display: none;
        }

        @media(max-width:480px) {
            .loadscr .loadTitle {
                font-size: 3em;
                color: white;
                text-align: center;
                width: 100vw;
                padding-top: 30vh;
            }
            
            .loadscr .logo {
                width: 1.4em;
            }
            
            .loadscr .loadHint {
                width: 100%;
                text-align: center;
                font-size: 1em;
                color: white;
            }

            .loadscr .progress {
                width: 80%;
                margin: 15px auto;
            }
        }

        @media(max-width:568px) {
            .loadscr .loadTitle {
                font-size: 3em;
                color: white;
                text-align: center;
                width: 100vw;
                padding-top: 30vh;
            }
            
            .loadscr .logo {
                width: 1.4em;
            }
            
            .loadscr .loadHint {
                width: 100%;
                text-align: center;
                font-size: 1em;
                color: white;
            }

            .loadscr .progress {
                width: 90%;
                margin: 15px auto;
            }
        }

        @media(max-width:991px) {
            .loadscr .progress {
                width: 60%;
                margin: 15px auto;
            }
        }
        /* 修復 Header 背景圖 */
        .banner-load {
            background-image: url('{{ asset('images/banner.jpg') }}') !important;
        }
    </style>
</head>
<body onload="loadProgress()">
    <div class="loadscr">
        <div class="loadTitle"><img src="{{ asset('images/logo.png') }}" class="logo" />&nbsp;&nbsp;&nbsp;L.S. Games</div>
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <span class="progressPercent"></span>
            </div>
        </div>
        <div class="loadHint">頁面載入中...</div>
    </div>
    <div class="pageWrap">
        <!-- 登入與註冊開始 -->
        <div class="hp_login" style="display: none;">
            <div class="login">
                <div class="container">
                    <div id="login" class="col-md-4 text-center">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">登入</h3>
                            </div>
                            <div class="panel-body">
                                <form name="login-form" method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group"><input type="text" class="form-control" name="username" placeholder="請輸入帳號" /></div>
                                    <div class="form-group"><input type="password" class="form-control" name="password" placeholder="請輸入密碼" /></div>
                                    <input type="hidden" name="refer" value="{{ url()->current() }}" />
                                    <div class="text-center" style="margin: 10px auto 0 0;">
                                        <input type="submit" class="btn btn-success" name="loginButton" value="登入" />
                                        {{-- 有開註冊功能才顯示 --}}
                                        @if(Session::get('registerable') == 'on')
                                            <input type="button" id="register" class="btn btn-info" value="註冊" />
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- 有開註冊功能才顯示 --}}
        @if(Session::get('registerable') == 'on')
            <div class="hp_register" style="display: none;">
                <div class="register">
                    <div class="container">
                        <div id="reg" class="col-md-4 text-center">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">註冊</h3>
                                </div>
                                <div class="panel-body">
                                    <form name="register-form" method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group"><input type="text" class="form-control" name="username" placeholder="請輸入帳號" /></div>
                                        <div class="form-group"><input type="text" class="form-control" name="usernickname" placeholder="請輸入您的暱稱" /></div>
                                        <div class="form-group"><input type="password" class="form-control" name="password" placeholder="請輸入密碼" /></div>
                                        <div class="form-group"><input type="password" class="form-control" name="password_confirmation" placeholder="請再次輸入密碼" /></div>
                                        <div class="form-group"><input type="email" class="form-control" name="email" placeholder="請輸入電子信箱地址" /></div>
                                        <input type="hidden" name="refer" value="{{ url()->current() }}" />
                                        <div class="text-center" style="margin: 10px auto 0 0;">
                                            <input type="submit" class="btn btn-success" name="registerButton" id="reg-submit" value="註冊" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- 登入與註冊結束 -->
        @include('frontend.layouts.header')
        <div class="about-section" id="about">
            <div id="content-wrap" class="container">
                {{-- 麵包屑 --}}
                <ol class="breadcrumb">
                    @if (Route::currentRouteName() == 'index')
                        <li class="thisPosition" style="color: #23527c;"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;洛嬉遊戲</li>
                    @elseif(Route::currentRouteName() == 'banned')
                        <li class="thisPosition" style="color: #23527c;"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;帳號被停權</li>
                    @else
                        <li><a href="{{ route('index') }}"><i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;洛嬉遊戲</a></li>
                        @foreach ($bc as $i => $b)
                            @if ($i == count($bc) - 1)
                                <li class="thisPosition">{{ $b['name'] }}</li>
                            @else
                                <li><a href="{{ $b['url'] }}">{{ $b['name'] }}</a></li>
                            @endif
                        @endforeach
                    @endif
                    {{-- 登入/使用者選單鈕 --}}
                    @if(! Auth::check())
                        <a id="loginForm" class="btn btn-info pull-right">登入</a>
                    @else
                        <div class="dropdown pull-right" style="display: inline-block; ">
                            <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                {{ Auth::user()->userNickname }}&nbsp;&nbsp;<span id="notifyFQty" class="badge">{{ Session::get('unotify') }}</span>
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1">
                                <li class="dropdown-header">使用者選單</li>
                                <li><a href="{{ route('dashboard.viewnotify') }}"><span id="notifyQty" class="badge">{{ Session::get('unotify') }}</span>&nbsp;則通知</a></li>
                                <li><a href="{{ route('dashboard.form', ['a=userdata']) }}">使用者設定</a></li>
                                <li><a href="{{ route('dashboard.form', ['a=userorders']) }}">確認訂單</a></li>
                                <li><a href="{{ route('logout') }}">登出</a></li>
                                @if(Auth::user()->userPriviledge == Session::get('bpriv')) 
                                    <li class="dropdown-header">管理者選單</li>
                                    <li><a href="{{ route('admin.index') }}">後台管理</a>
                                @endif
                            </ul>
                        </div>
                    @endif
                </ol>
                {{-- 顯示錯誤訊息（經由 withErrors 方法） --}}
                @if($errors->any())
                    <div @if($errors->first('type') == 'error') class="alert alert-danger alert-dismissible fade in" @elseif($errors->first('type') == 'warning')  class="alert alert-warning alert-dismissible fade in"  @else class="alert alert-success alert-dismissible fade in" @endif role="alert" style="margin-top: 1em;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        @foreach($errors->all() as $msg)
                            @if(!$loop->last)
                                <h4><strong>{{ $msg }}</strong></h4>@if($loop->index != ($loop->count - 2)) <br /> @endif
                            @endif
                        @endforeach
                    </div>
                @endif
                {{-- 顯示錯誤訊息（經由 session 方法） --}}
                @if(! empty(session('errormsg')))
                    <div @if(session('errormsg')['type'] == 'error') class="alert alert-danger alert-dismissible fade in" @elseif(session('errormsg')['type'] == 'warning')  class="alert alert-warning alert-dismissible fade in"  @else class="alert alert-success alert-dismissible fade in" @endif role="alert" style="margin-top: 1em;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4><strong>{{ session('errormsg')['msg'] }}</strong></h4>
                    </div>
                @endif
                {{-- 顯示錯誤訊息（經由 ajax 方法） --}}
                <div id="ajaxmsg"></div>
                @yield('content')
            </div>
        </div>
        @include('frontend.layouts.footer')
    </div>
</body>
</html>