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

    <!-- fileinput CSS -->
    <link href="/pwdManager/pwdManager/Public/utils/fileinput/fileinput.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/pwdManager/pwdManager/Public/utils/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/pwdManager/pwdManager/Public/custom/css/sb-admin-2.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" rel="stylesheet">

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
    <script src="//cdn.bootcss.com/startbootstrap-sb-admin-2/3.3.7+1/js/sb-admin-2.min.js"></script>
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
<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
    <div class="container nav-container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#top-navbar-1">
                <span class="sr-only">Password Manager</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand head" href="#">Password Manager <small>-- Your best assistant</small></a>
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

    <div class="sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="/pwdManager/pwdManager/index.php/Customer/Index/index"><i class="fa fa-list-alt fa-fw"></i> Overview
                    </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-list fa-fw"></i> Manage Passwords
                    <span class="fa arrow"></span>
                    </a>
                    <ul class="nav nav-second-level">
                    <li>
                    <a href="/pwdManager/pwdManager/index.php/Customer/Password/index">My Passwords</a>
                    </li>
                    <li>
                    <a href="/pwdManager/pwdManager/index.php/Customer/Password/add">Add New Passwords</a>
                    </li>
                    </ul>
                </li>
                <li>
                    <a href="/pwdManager/pwdManager/index.php/Customer/Profile/index"><i class="fa fa-user fa-fw"></i> My Profile
                    </a>
                </li>
                <li>
                    <a href="/pwdManager/pwdManager/index.php/Customer/Generator/index"><i class="fa fa-lightbulb-o fa-fw"></i> Password Generator
                    </a>
                </li>
                <li>
                    <a href="/pwdManager/pwdManager/index.php/Customer/Checker/index"><i class="fa fa-check-square-o fa-fw"></i> Password Strength Checker
                    </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>


<style type="text/css">
    .lj-alert h4{
        font-weight: 100;
    }
</style>
<div id="page-wrapper">
    <div class="col-xs-10 col-sm-8 col-md-6">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit password</h1>
            </div>
        </div>

        <form class="form-horizontal" id="info-info-panel" action="/pwdManager/pwdManager/index.php/Customer/Password/edit" method="post" enctype="multipart/form-data">
            <?php if(isset($info["error"])): ?><div class="alert alert-danger" role="alert"><?php echo ($info["error"]); ?></div><?php endif; ?>

            <?php if(isset($info["message"])): ?><br>
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p><?php echo ($info["message"]); ?></p>
                </div><?php endif; ?>
            <input style="display: none" type="number" name="pwd_id" id="pwd-id" value="<?php echo ($info["pwd_id"]); ?>">
            <div class="form-group">
                <label for="info-item" class="col-sm-4 control-label">Item</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="item" id="info-item" placeholder="Which site your password is for (like 'facebook')" value="<?php echo ($info["item"]); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="info-name" class="col-sm-4 control-label">User name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="name" id="info-name" placeholder="Your id/name in the site (like 'Mark')"  value="<?php echo ($info["name"]); ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="info-password" class="col-sm-4 control-label">Old Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="old-password" id="old-password" placeholder="Your old password for this item" required>
                </div>
            </div>
            <div class="form-group">
                <label for="info-password" class="col-sm-4 control-label">Safety Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="safety-password" id="safety-password" placeholder="Your safety password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="info-password" class="col-sm-4 control-label">New Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password" id="info-password" placeholder="The content of your password(like '123456a')" value="" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-5 col-sm-3">
                    <button type="button" class="btn btn-primary btn-block" id="submit" onclick="pwd_check();">save</button>
                </div>
            </div>
        </form>
    </div>

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

<!--Auto logout function-->
<script>
var maxTime = 600; // seconds
    var time = maxTime;
    $('body').on('keydown mousemove mousedown', function(e){
        time = maxTime; // reset
    });
    var intervalId = setInterval(function(){
        time--;
        if(time <= 0) {
            ShowInvalidLoginMessage();
            clearInterval(intervalId);
        }
    }, 1000)
    function ShowInvalidLoginMessage(){
        alert('Due to no operations within 10 minutes, you are being automatically logout.');
        $(location).attr('href', '/pwdManager/pwdManager/index.php/Home/Index/logout')
    }
</script>
<script src="/pwdManager/pwdManager/Public/utils/encryption/sha256.js"></script>
<script src="/pwdManager/pwdManager/Public/utils/encryption/aes.js"></script>
<script src="/pwdManager/pwdManager/Public/utils/encryption/aes.ctr.js"></script>
<script type="text/javascript">

    function pwd_check(){
        var pwd = $('#safety-password').val();
        var url = "/pwdManager/pwdManager/index.php/Customer/Password/check_safety_pwd";
        var data = {pwd : pwd};
        $.post(url, data, function (res) {
            if(res.code==0){
                item_pwd_check(res.salt);
            } else {
                alert("Wrong safety password!");
            }
        });
    }
    function item_pwd_check(salt){
        var id = $('#pwd-id').val();
        var safety_pwd = $('#safety-password').val();
        var item_pwd = $('#old-password').val();
        var enc_pwd = safety_pwd+salt;
        var url = "/pwdManager/pwdManager/index.php/Customer/Password/check_item_pwd";
        var data =
        {
            id : id
            //pwd : final_pwd
        };
        $.post(url, data, function (res) {
            if(res.code==0){
                var cipher = res.pwd;
                var original_pwd = Aes.Ctr.decrypt(cipher,enc_pwd,256);
                if(original_pwd==item_pwd){
                    pwd_submit(salt);
                }
            } else {
                alert("Wrong old password!");
            }
        });
    }
    function pwd_submit(salt){
        var data =[];
        var id = $('#pwd-id').val();
        var item = $('#info-item').val();
        var name = $('#info-name').val();
        var plaintext = $('#info-password').val();
        var pwd = $('#safety-password').val();
        var enc_pwd = pwd+salt;
        //alert(enc_pwd);
        var final_pwd =  Aes.Ctr.encrypt(plaintext, enc_pwd, 256);
        data = {
            id : id,
            password : final_pwd,
            item : item,
            name : name
        };
        var url = "/pwdManager/pwdManager/index.php/Customer/Password/edit";
        $.post(url, data, function (res) {
            if(res.code==0){
                alert("Success!");
                location.reload();
            } else {
                alert("Failed to edit password, please try again!");
            }
        });
    }

</script>
</body>
</html>