<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="author" content="WEBARQ ~ Muhamad Reza Abdul Rohim"/>
<meta name="keywords" content="WCMS Version 1.0.0"/>
<meta name="description" content="WCMS Version 1.0.0 Human Develop"/>
<meta name="_token" id = 'csrf-token' content="{{ csrf_token() }}"/>
<link type="text/css" href="{{ \Helper::assetUrl() }}backend/css/reset.css" rel="stylesheet" media="screen,projection"/>
<link type="text/css" href="{{ \Helper::assetUrl() }}backend/css/jquery.alert.css" rel="stylesheet" media="screen,projection"/>
<link type="text/css" href="{{ \Helper::assetUrl() }}backend/css/function.css" rel="stylesheet" media="screen,projection"/>
<link type="text/css" href="{{ \Helper::assetUrl() }}backend/css/login/style.css" rel="stylesheet"/>
<link rel="stylesheet" type="text/css" href="{{ \Helper::assetUrl() }}backend/sweetalert/dist/sweetalert.css">
<script type="text/javascript" src="{{ \Helper::assetUrl() }}backend/js/1.8.0.js"></script>
<script type="text/javascript" src="{{ \Helper::assetUrl() }}backend/js/login.js"></script>
<script src="{{ \Helper::assetUrl() }}backend/sweetalert/dist/sweetalert.min.js"></script>
<title>Login Area</title>
</head>
<body>
<div id="body-wrapper">
    <div id="wrapper-content">
        <div id="wg-user-admin-webarq-login" class="normal" style="margin-top:10%;">
            <div class="wg-header header-left">
                <div class="wg-header header-right">
                    <div class="wg-header header-center">
                        <div id="inner-header-right">
                            <div class="logo-client"></div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wg-content">
                <div class="wording">
                    {!! Form::open() !!}
                        <div class="fl label username"></div>
                        <div class="fl input">
                            {!! Form::text('username' , null ,  ['placeholder' => 'Username'] ) !!}
                        </div>
                        <div class="clear break15"></div>
                        <div class="fl label password"></div>
                        <div class="fl input">
                             {!! Form::password('password' ,  ['placeholder' => 'Password'] ) !!}
                        </div>
                        <div class="clear break15"></div>
                       
                        @if(\Session::has('message'))
                            {!! \Helper::alert('error' , "ERROR" , \Session::get('message')) !!}
                        @endif
                       
                        <div>
                            <div class="fl">
                                <a class="forgot-password" style="color:#1076bc;font:11px/32px verdana;" onclick = 'return forgot()'>Forgot password ?</a>
                            </div>
                            <input type="submit" class="submit" value=""/>
                            <div class="clear break1"></div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <div class="wg-footer">
                <div class="wording">WEBARQ Content Management System</div>
            </div>
            <div class="break10"></div>
            <div class="logo-webarq">Copyright &copy; 2015</div>
        </div>
    </div>
</div>
</div>
</body>
</html>