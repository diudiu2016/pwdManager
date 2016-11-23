<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/pwdManager2/pwdManager/Public/logo/favicon.ico">

    <title><?php echo ($data["title"]); ?></title>

    <link rel="icon" href="/pwdManager2/pwdManager/Public/logo/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="/pwdManager2/pwdManager/Public/utils/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fontawesome CSS -->
    <link href="/pwdManager2/pwdManager/Public/utils/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/pwdManager2/pwdManager/Public/custom/css/style.css" rel="stylesheet">


    <script type="text/javascript" src="/pwdManager2/pwdManager/Public/utils/jquery/jquery-1.10.2.min.js"></script>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]>
    <!--<script src="/pwdManager2/pwdManager/Public/utils/ie/ie8-responsive-file-warning.js"></script>-->
    <![endif]-->
    <!--<script src="/pwdManager2/pwdManager/Public/utils/ie/ie-emulation-modes-warning.js"></script>-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/pwdManager2/pwdManager/Public/utils/html5/html5shiv.min.js"></script>
    <script src="/pwdManager2/pwdManager/Public/utils/html5/respond.min.js"></script>

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
            <a class="navbar-brand head" href="/pwdManager2/pwdManager/index.php/Home/index/index">Password Manager <small>-- Your best assistant</small></a>
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
                                    <li><a href="/pwdManager2/pwdManager/index.php/Customer/Index/index">Personal Information</a></li>
                                    <li><a href="/pwdManager2/pwdManager/index.php/Customer/Password/index">My Passwords</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="/pwdManager2/pwdManager/index.php/Home/Index/logout">Log Out</a></li>
                                </ul>
                            </li>

                        </ul><?php break;?>
                    <?php case "2": ?><li><a class="btn btn-" href="#"><?php echo (session('user_nickname')); ?></a></li><?php break;?>
                    <?php default: ?>
                    <li class="active"><a class="btn btn-default" href="/pwdManager2/pwdManager/index.php/Home/Index/index">Log In</a></li><?php endswitch;?>
            </ul>
        </div>
    </div>
</nav>
<style type="text/css">
    body{
        background-image: url(/pwdManager2/pwdManager/Public/picture/bg1.jpg);
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
                        <h3 align="center"><strong>Sign up</strong> for a new account</h3>
                    </div>
                    <div class="form-top-right">
                        <span aria-hidden="true" class="typcn typcn-pencil"></span>
                    </div>
                </div>
                <div class="form-bottom">
                    <form role="form" action="/pwdManager2/pwdManager/index.php/Home/User/register" method="post" id="registerForm" onsubmit="return check(this)" data-parsley-validate>
                        <div class="form-group">
                            Email :
                            <label class="sr-only" for="form-email">Email</label>
                            <input type="email" name="email" placeholder="Your Email"
                                   class="form-email form-control" id="form-email" data-parsley-type="email" data-parsley-trigger="blur" data-parsley-required required>
                        </div>
                        <p id="errorHint1" class="errMsg" style="display: none; font-size:10px; color: red">
                            This email has already registered!
                        </p>
                        <div class="form-group">
                            Nickname :
                            <label class="sr-only" for="form-email">Nickname</label>
                            <input type="text" name="nickname" placeholder="Your Nickname"
                                   class="form-nickname form-control" id="form-nickname"  data-parsley-trigger="blur" data-parsley-required required>
                        </div>
                        <div class="form-group">
                            Password:
                            <label class="sr-only" for="form-password">Password</label>
                            <input type="password" name="password" placeholder="Your Log-in Password"
                                   class="form-email form-control" id="form-password"  data-parsley-trigger="blur" data-parsley-required required>
                        </div>
                        <p id="errorHint5" class="errMsg" style="display: none; font-size:10px; color: red">
                            Please enter a password with length 4-50.
                        </p>
                        <div class="form-group">
                            Password Again:
                            <label class="sr-only" for="form-password">Password</label>
                            <input type="password" name="password_1" placeholder="Input Your Password Again"
                                   class="form-email form-control" id="form-password-1" data-parsley-trigger="blur" data-parsley-required required>
                        </div>
                        <p id="errorHint2" class="errMsg" style="display: none; font-size:10px; color: red">
                            The passwords you have typed are not consistent, please try again!
                        </p>
                        <!--Double password-->
                        <div class="form-group">
                            Second Password: (length:4-50)
                            <label class="sr-only" for="form-password">Password</label>
                            <input type="password" name="password_2" placeholder="Your Second Password"
                                   class="form-email form-control" id="form-password-2"  data-parsley-trigger="blur" data-parsley-required required>
                        </div>
                        <p id="errorHint6" class="errMsg" style="display: none; font-size:10px; color: red">
                            Please enter a password with length 4-50.
                        </p>
                        <div class="form-group">
                            Second Password Again:
                            <label class="sr-only" for="form-password">Password</label>
                            <input type="password" name="password_3" placeholder="Input Your Second Password Again"
                                   class="form-email form-control" id="form-password-3" data-parsley-trigger="blur" data-parsley-required required>
                        </div>
                        <p id="errorHint3" class="errMsg" style="display: none; font-size:10px; color: red">
                            The passwords you have typed are not consistent, please try again!
                        </p>
                        <p id="errorHint4" class="errMsg" style="display: none; font-size:10px; color: red">
                            The login password and second password cannot be the same, please try again!
                        </p>
                        <button type="submit" id="submit" href="/pwdManager2/pwdManager/index.php/Home/User/register"
                                class="btn btn-block sign-up-main btn-primary" ><strong>Sign Up</strong></button>
                        <br>
                        <span style="float: right"><small>Already have an account? <strong><a href="/pwdManager2/pwdManager/index.php/Home/Index/index">Log in</a></strong> now!</small></span>
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
<script type="text/javascript" src="/pwdManager2/pwdManager/Public/utils/jquery/jquery-1.10.2.min.js"></script>

<!--highcharts-->
<script src="/pwdManager2/pwdManager/Public/utils/highcharts/highcharts.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/pwdManager2/pwdManager/Public/utils/bootstrap/js/bootstrap.min.js"></script>

<!-- canvas-to-blob JavaScript -->
<script src="/pwdManager2/pwdManager/Public/utils/fileinput/canvas-to-blob.min.js"></script>

<!-- fileinput JavaScript -->
<script src="/pwdManager2/pwdManager/Public/utils/fileinput/fileinput.min.js"></script>

<!-- fileinput JavaScript -->
<script src="/pwdManager2/pwdManager/Public/utils/fileinput/fileinput_locale_zh.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/pwdManager2/pwdManager/Public/utils/metisMenu/dist/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/pwdManager2/pwdManager/Public/custom/js/sb-admin-2.js"></script>

<!--<script src="/pwdManager2/pwdManager/Public/custom/js/admin.js"></script>-->

<script type="text/javascript">
    function check(form){
        console.log(form.password.value + " "+ form.password_1.value);
        if(form.password.value.length<4 || form.password.value.length > 50){
            var error = document.getElementById("errorHint5");
            error.style.display = "block";
            return false;
        }else if(form.password_2.value.length<4 || form.password_2.value.length > 50){
            var error = document.getElementById("errorHint6");
            error.style.display = "block";
            return false;
        }else if(form.password.value != form.password_1.value){
            var error = document.getElementById("errorHint2");
            error.style.display = "block";
            return false;
        }else if(form.password_2.value != form.password_3.value ){
            var error = document.getElementById("errorHint3");
            error.style.display = "block";
            return false;
        }else if (form.password.value == form.password_2.value){
            var error = document.getElementById("errorHint4");
            error.style.display = "block";
            return false;
        }
        return true;
    }

    $(document).ready(function() {
        $("input").change(function(){
            $(".errMsg").hide();
          });
    });
//    $('#submit').click(function(){
//        var url = $(this).attr('href');
//        var email = document.getElementById("form-email").value;
//        var nickname = document.getElementById("form-nickname").value;
//        var password = document.getElementById("form-password").value;
//        var password1 = document.getElementById("form-password-1").value;
//        var password-2 = document.getElementById("form-password-2").value;
//        var password-3 = document.getElementById("form-password-3").value;
//        //alert(nickname+" "+password+" "+password1);
//        if(password != password1) {
//            var error = document.getElementById("errorHint2");
//            error.style.display = "block";
//        }
//        if(password2 != password3) {
//            var error = document.getElementById("errorHint3");
//            error.style.display = "block";
//        }
//        if (password == password2) {
//            var error = document.getElementById("errorHint4");
//            error.style.display = "block";
//        }
//            else {
//            var data = [];
//            data['email'] = email;
//            data['nickname'] = nickname;
//            data['password'] = password;
//            data['password-2'] = password-2;
//            //alert(data['email']);
//            $.post(url, data, function(res){
//                if (res.code == 0) {
//                    alert("Register successfully!");
//                    location.href = "/pwdManager2/pwdManager/index.php/Home/Index/index";
//                } else if (res.code == 1){
//                    var error = document.getElementById("errorHint1");
//                    error.style.display = "block";
//                } else {
//                    alert("Sorry, you failed to register" + res.code);
//                }
//            });
//        }
//    });
</script>
</body>
</html>