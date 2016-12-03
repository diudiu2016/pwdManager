<?php if (!defined('THINK_PATH')) exit();?><script src="../../../Public/utils/jquery/jquery-1.10.2.min.js"></script>
<!DOCTYPE html>
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


<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Password Generator</h1>
        </div>
    </div>
    <form>
    <div class="form-group">
        <label for="lengthInput">Length (4-50)</label>
        <input type="length" class="form-control" id="lengthInput" placeholder="Input length">
    </div>
    <div class="checkbox">
        <label>
            <input id = "includeSymbolCheckbox" name="condCheckbox" type="checkbox" checked> include sympbols
        </label>
    </div>
    <div class="checkbox">
        <label>
          <input id="includeNumCheckbox" name="condCheckbox" type="checkbox" checked> include numbers
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input id="includeLowCaseCheckbox" name="condCheckbox" type="checkbox" checked> include lower case characters
        </label>
    </div>
    <div class="checkbox">
        <label>
            <input id="includeUpCaseCheckbox" name="condCheckbox" type="checkbox" checked> include upper case characters
        </label>
  </div>
  
    <button type="button" id="genBtn" class="btn btn-info">Generate</button>

    <p id="errMsg1" class="errMsg" style="display: none; font-size:10px; color: red">
        Please input a valid number in the range 4-50 for length.
    </p>
    <p id="errMsg2" class="errMsg" style="display: none; font-size:10px; color: red">
        Please select at least one condition for password generation.
    </p>
    </form>

    <!--Result area-->
    <div class="row">
      <div class="col-xs-4">Generated password: </div>
      <div id="result" class="col-xs-6"></div>
      <div id="copyBtn" class="col-xs-2">
          <button id="copyBtn" type="button" class="btn btn-secondary">Copy</button>
      </div>
    </div>

</div>

<script>

    $(document).ready(function() {
        $("#copyBtn").on('click', copyToClipboard);

        $('#genBtn').click(function(){
        var lengthInput = $("#lengthInput").val();
        if (!ckIsInt(lengthInput) || !ckIsInRange(lengthInput, 4, 50)){
            var errorMsg = document.getElementById("errMsg1");
            errorMsg.style.display = "block";
            return false;
        }
        var checkboxes=document.getElementsByName("condCheckbox");
        var selectedCond = containChecked(checkboxes);
        if (selectedCond.length <1){
            var errorMsg = document.getElementById("errMsg2");
            errorMsg.style.display = "block";
            return false;
        }
        var pool = new Array(4);
        pool[0] = "!@#$%^&*()";
        pool[1] = "0123456789";
        pool[2] = "abcdefghijklmnopqrstuvwxyz";
        pool[3] = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        var selectedCondLength = selectedCond.length;
        var result = "";
        for (var i=0; i<lengthInput;i++){
            var poolLoc = (selectedCond.length >1)?selectedCond.charAt(Math.floor((Math.random() * selectedCondLength))): selectedCond;
            var poolLength = pool[poolLoc].length;
            result += pool[poolLoc].charAt((Math.random() * poolLength));
        }
        $("#result").text(result);
      });

      $("input").change(function(){
        $(".errMsg").hide();
      });
      $("#lengthInput").on('change keydown paste input', function(){
          $(".errMsg").hide();
      });
    });

    function ckIsInt(val){
      return !isNaN(val) && parseInt(Number(val)) == val && !isNaN(parseInt(val, 10));
    }

    function ckIsInRange(num, min, max){
      return (num<=max && num>=min)?true:false;
    }

    function containChecked(checkboxes){
      var length = checkboxes.length;
      var selected = "";
      for (var i=0; i<length; i++){
          if (checkboxes[i].checked)
            selected += i;
      }
      return selected;
    }

    function copyToClipboardFF(text) {
      window.prompt ("Copy to clipboard: Ctrl C, Enter", text);
    }

    function copyToClipboard() {
      var input = $("#result");

      var success = true,
         range = document.createRange(),
         selection;

     // For IE.
     if (window.clipboardData) {
       window.clipboardData.setData("Text", input.text());
     } else {
       // Create a temporary element off screen.
       var tmpElem = $('<div>');
       tmpElem.css({
         position: "absolute",
         left:     "-1000px",
         top:      "-1000px",
       });
       // Add the input value to the temp element.
       tmpElem.text(input.text());
       $("body").append(tmpElem);
       // Select temp element.
       range.selectNodeContents(tmpElem.get(0));
       selection = window.getSelection ();
       selection.removeAllRanges ();
       selection.addRange (range);
       // Lets copy.
       try { 
         success = document.execCommand ("copy", false, null);
       }
       catch (e) {
         copyToClipboardFF(input.val());
       }
       if (success) {
         // remove temp element.
         tmpElem.remove();
          }
      }
    }
</script>

<!-- /#page-wrapper -->
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
</body>
</html>