<?php

/**
 * 设置用户登录状态
 */
function set_login($user_id, $user_nickname, $user_status ){
    session('user_id', $user_id);
    session('user_status', $user_status);
//    if (!$user_name) $user_name = '';
//    if (!$user_avatar) $user_avatar = 'avatar/default.jpg';
//    session('user_name', $user_name);
//    session('user_avatar', $user_avatar);
    session('user_nickname',$user_nickname);
}

/**
 * 更新头像
 */

function update_avatar($user_avatar) {
    session('user_avatar', $user_avatar);
}


/**
 * 更新用户名
 */

function update_name($user_name) {
    session('user_name', $user_name);
}


/**
 * 退出登录
 */
function set_logout() {
    session('[destroy]');
}

/**
 * 退出登录
 */
function auto_lougout() {
    session('[destroy]');
}


/**
 * 检测用户是否登录
 * @return integer 0-未登录，大于0-当前登录用户ID
 */
function is_login(){
    $user_id = session('user_id');
    if (empty($user_id)) {
        return 0;
    } else {
        return $user_id;
    }
}


/**
 * 获取用户 id
 */
function get_user_id() {
    return session('user_id');
}


/**
 * 获取用户 name
 */
function get_user_name() {
    return session('user_name');
}




/**
 * 检测用户类型
 * @return integer 0-未登录，大于0-当前登录用户类型
 */
function get_user_status() {
    $user_status = session('user_status');
    if (empty($user_status)) {
        return 0;
    } else {
        return $user_status;
    }
}


/**
 * 判断用户登录凭证是属于card还是phone
 * @param string
 * @return string card,phone
 */
function is_card_or_phone($number) {
    if (reg_exp_phone($number)) {
        return 'phone';
    } else {
        return 'card';
    }
}

/**
 * @description 验证手机号
 * @param string
 * @return boolean
 */
function reg_exp_phone($string) {
    $pattern =  '/^(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/';
    if (preg_match($pattern, $string)) {
        return true;
    } else {
        return false;
    }
}


/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str  要分割的字符串
 * @param  string $glue 分割符
 * @return array
 */
function str2arr($str, $glue = ','){
    return explode($glue, $str);
}

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 */
function arr2str($arr, $glue = ','){
    return implode($glue, $arr);
}

/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
}


/**
 * 系统加密方法
 * @param string $data 要加密的字符串
 * @param string $key  加密密钥
 * @param int $expire  过期时间 单位 秒
 * @return string
 */
function think_encrypt($data, $key = '', $expire = 0) {
    $key  = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data = base64_encode($data);
    $x    = 0;
    $len  = strlen($data);
    $l    = strlen($key);
    $char = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    $str = sprintf('%010d', $expire ? $expire + time():0);

    for ($i = 0; $i < $len; $i++) {
        $str .= chr(ord(substr($data, $i, 1)) + (ord(substr($char, $i, 1)))%256);
    }
    return str_replace(array('+','/','='),array('-','_',''),base64_encode($str));
}

/**
 * 系统解密方法
 * @param  string $data 要解密的字符串 （必须是think_encrypt方法加密的字符串）
 * @param  string $key  加密密钥
 * @return string
 */
function think_decrypt($data, $key = ''){
    $key    = md5(empty($key) ? C('DATA_AUTH_KEY') : $key);
    $data   = str_replace(array('-','_'),array('+','/'),$data);
    $mod4   = strlen($data) % 4;
    if ($mod4) {
        $data .= substr('====', $mod4);
    }
    $data   = base64_decode($data);
    $expire = substr($data,0,10);
    $data   = substr($data,10);

    if($expire > 0 && $expire < time()) {
        return '';
    }
    $x      = 0;
    $len    = strlen($data);
    $l      = strlen($key);
    $char   = $str = '';

    for ($i = 0; $i < $len; $i++) {
        if ($x == $l) $x = 0;
        $char .= substr($key, $x, 1);
        $x++;
    }

    for ($i = 0; $i < $len; $i++) {
        if (ord(substr($data, $i, 1))<ord(substr($char, $i, 1))) {
            $str .= chr((ord(substr($data, $i, 1)) + 256) - ord(substr($char, $i, 1)));
        }else{
            $str .= chr(ord(substr($data, $i, 1)) - ord(substr($char, $i, 1)));
        }
    }
    return base64_decode($str);
}


function get_token($bits) {
    $string = bin2hex(openssl_random_pseudo_bytes($bits));
    return $string;
}

function get_order_number() {
    $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
    $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
    return $orderSn;
}


/**
 * @description 生成会员卡密码
 */

function set_card_password(){
    return mt_rand(100000, 999999);
}

function sendmail($tomail,$title,$content){
/*邮件设置信息*/
        $email_set = C('EMAIL_SET');
        Vendor('phpmailer.class#phpmailer');
        Vendor("phpmailer.class#smtp"); //可选,否则会在class.phpmailer.php中包含
        
        $mail = new PHPMailer(true); //实例化PHPMailer类,true表示出现错误时抛出异常
        
          $mail->IsSMTP(); // 使用SMTP
          $mail->CharSet ="UTF-8";//设定邮件编码
          $mail->SMTPDebug  = 0;                     // 启用SMTP调试 1 = errors  2 =  messages
          $mail->SMTPAuth   = true;                  // 服务器需要验证
          $mail->Port       = "587";                    // 设置端口
          $mail->Username   = "pwdmanager3334@gmail.com"; //SMTP服务器的用户帐号
          $mail->Password   = "pwdManager3334root";       //SMTP服务器的用户密码

          if (is_array($tomail)){
              foreach ($tomail as $m){
                   $mail->AddAddress($m, 'user'); 
              }
          }else{
              $mail->AddAddress($tomail, 'user');
          }
         
          $mail->SetFrom('pwdmanager3334@gmail.com','Password Manager Team');
          $mail->Subject = $title;
        
          //以下是邮件内容相关
          $mail->Body = $content;
          $mail->IsHTML(true);
        
        $mail->SMTPSecure = "tls";
        $mail->Host       = "smtp.gmail.com"; // SMTP server
        return $mail->Send()? true:false;
}
?>
