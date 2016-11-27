<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/pwdManager/pwdManager/Public/logo/favicon.ico">

    <title><?php echo ($data["title"]); ?></title>

    <link rel="icon" href="/pwdManager/pwdManager/Public/logo/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="/pwdManager/pwdManager/Public/utils/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fontawesome CSS -->
    <link href="/pwdManager/pwdManager/Public/utils/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/pwdManager/pwdManager/Public/custom/css/style.css" rel="stylesheet">


    <script type="text/javascript" src="/pwdManager/pwdManager/Public/utils/jquery/jquery-1.10.2.min.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <!--<script src="/pwdManager/pwdManager/Public/utils/ie/ie8-responsive-file-warning.js"></script>-->
    <![endif]-->
    <!--<script src="/pwdManager/pwdManager/Public/utils/ie/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/pwdManager/pwdManager/Public/utils/html5/html5shiv.min.js"></script>
    <script src="/pwdManager/pwdManager/Public/utils/html5/respond.min.js"></script>

    <![endif]-->
</head>

<body>

<style type="text/css">
    .head {
        font-size: 30px;
    }
    .head small {
        font-size: 20px;
    }
    .nav-text {
        font-size: 20px;
    }
    .nav-container {
        margin-top: 10px;
        margin-bottom: 10px;
    }
</style>
<nav class="navbar navbar-inverse navbar-no-bg" role="navigation">
    <div class="container nav-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Password Manager</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand head" href="/pwdManager/pwdManager/index.php/Home/index/index">Password Manager <small>-- Your best assistant</small></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="top-navbar-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a class="scroll-link nav-text" href="#">Features</a></li>
                <li><a class="scroll-link nav-text" href="#">Testimonials</a></li>
                <li><a class="scroll-link nav-text" href="#">Sharepad</a></li>
                <?php switch($_SESSION['user_status']): case "1": ?><ul class="nav navbar-nav navbar-right">
                            <li class="dropdown active">
                                <a href="#" class="dropdown-toggle" id="nav-user" data-id="<?php echo ($user["account_id"]); ?>" data-type="1" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                    <?php echo (session('user_nickname')); ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/pwdManager/pwdManager/index.php/Customer/Index/index">Personal Information</a></li>
                                    <li><a href="/pwdManager/pwdManager/index.php/Customer/Password/index">My Passwords</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/pwdManager/pwdManager/index.php/Home/Index/logout">Log Out</a></li>
                                </ul>
                            </li>

                        </ul><?php break;?>
                    <?php case "2": ?><li><a class="btn btn-" href="#"><?php echo (session('user_nickname')); ?></a></li><?php break;?>
                    <?php default: ?>
                    <li class="active"><a class="btn btn-default" href="/pwdManager/pwdManager/index.php/Home/Index/index">Log In</a></li><?php endswitch;?>
            </ul>
        </div>
    </div>
</nav>
<style type="text/css">
    body{
        background-image: url(/pwdManager/pwdManager/Public/picture/bg1.jpg);
        background-size: cover;
        position:absolute;
        width: 100%;
        height: 100%;
        font-size: 18px;
        line-height: 20px;
        font-family: arial, sans-serif;
        color: #9c9c9c;
        min-width: 920px;
    }
</style>

<div class="page-center" >
<div class="container">
    <div class="row">
        <div class="col-sm-7">
            <h1>some description<span id="typed"></span></h1>
            some description

        </div>
    <!-- Form Start -->
    <div class="col-sm-5 panel panel-default form-box">
        <div class="form-top">
            <div class="form-top-left">
                <h3 align="center"><strong>Log in</strong> and manage your passwords</h3>
            </div>
            <div class="form-top-right">
                <span aria-hidden="true" class="typcn typcn-pencil"></span>
            </div>
        </div>
        <div class="form-bottom">
            <form role="form" action="/pwdManager/pwdManager/index.php/Home/User/index" method="post" id="loginForm" data-parsley-validate>
                <div class="form-group">
                    Email :
                    <label class="sr-only" for="form-email">Email</label>
                    <input type="email" name="email" placeholder="Your Email"
                           class="form-email form-control" id="form-email" data-parsley-type="email" data-parsley-trigger="blur" data-parsley-required>
                </div>
                <div>
                </div>
                <div class="form-group">
                    Password:
                    <label class="sr-only" for="form-password">Password</label>
                    <input type="password" name="password" placeholder="Your Log-in Password"
                           class="form-email form-control" id="form-password"  data-parsley-trigger="blur" data-parsley-required>
                </div>


                <button type="submit" class="btn btn-block sign-up-main btn-primary" ><strong>Log In</strong></button>
                <br>
                <span style="float: right"><small>Do not have an account? <strong><a href="/pwdManager/pwdManager/index.php/Home/User/register">Sign up</a></strong> instead!</small></span>
                <br>
            </form>
        </div>
    </div>

    <!-- Form End -->
    </div>
</div><!-- /.container -->
</div>
</div>

<!--jQuery-->
<script type="text/javascript" src="/pwdManager/pwdManager/Public/utils/jquery/jquery-1.10.2.min.js"></script>

<!--highcharts-->
<script src="/pwdManager/pwdManager/Public/utils/highcharts/highcharts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/pwdManager/pwdManager/Public/utils/bootstrap/js/bootstrap.min.js"></script>

<!-- canvas-to-blob JavaScript -->
<script src="/pwdManager/pwdManager/Public/utils/fileinput/canvas-to-blob.min.js"></script>

<!-- fileinput JavaScript -->
<script src="/pwdManager/pwdManager/Public/utils/fileinput/fileinput.min.js"></script>

<!-- fileinput JavaScript -->
<script src="/pwdManager/pwdManager/Public/utils/fileinput/fileinput_locale_zh.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/pwdManager/pwdManager/Public/utils/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/pwdManager/pwdManager/Public/custom/js/sb-admin-2.js"></script>

<!--<script src="/pwdManager/pwdManager/Public/custom/js/admin.js"></script>-->


</body>
</html>