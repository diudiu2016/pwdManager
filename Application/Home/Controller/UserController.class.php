<?php
namespace Home\Controller;
use Think\Controller;
import('ORG.Mail');
class UserController extends Controller {

    public $sms_id;
    public $phone = 0;

//    public function _initialize() {
//        if (is_login()) {
//            if(get_user_status() == C('USER_CUSTOMER_STATUS')) {
//                $this->redirect('Customer/Index/index', '', 0);
//            } else if(get_user_status() == C('USER_ADMINI_STATUS')) {
//                //$this->redirect('Customer/Index/index', '', 0);
//            } else {
//                set_logout();
//                $this->redirect('Home/Index/index', '', 0);
//            }
//        } else {
//        }
//    }

    // 登录页面
    public function index() {
        $data['data']['title'] = '登陆';
        if (IS_POST) {
            $email = I('post.email', '');
            $password = I('post.password', 0);
            if ($email && $password) {
                //recaptcha
                $post_data = array(
                    'secret' => '6Lcnmw0UAAAAAHqHJK9RLLuvLeOIS-dcQbd0iUNQ',
                    'response' => $_POST["g-recaptcha-response"]    );
                $recaptcha_json_result = $this->send_post('https://www.google.com/recaptcha/api/siteverify', $post_data);
                $recaptcha_result = json_decode($recaptcha_json_result);
                //var_dump($recaptcha_result);
                $recaptcha_array = json_decode(json_encode($recaptcha_result), True);
                //dump($recaptcha_array);
                if($recaptcha_array['success']=='true'){

                    $User = M('user');
                    $where['email'] = $email;
                    $find = $User->where($where)->field('user_id,nickname,status')->find();

                    if ($find) {
                        $UserAuthenticate = M("user_authenticate");
                        $where2['user_id'] = $find['user_id'];
                        $where2['password'] = hash('sha256',$password);
                        print_r($where2);
                        $find2 = $UserAuthenticate->where($where2)->find();

                        if($find2){
                            set_login($find['user_id'],$find['nickname'], $find['status'], $email);
                            $this->redirect('Customer/Index/index', '', 0);
                            if(get_user_status() == C('USER_CUSTOMER_STATUS')) {
                                $this->redirect('Customer/Index/index', '', 0);
                            } else if(get_user_status() == C('USER_ADMINI_STATUS')) {
                                //$this->redirect('Admin/Index/index', '', 0);
                            } else {
                                set_logout();
                                $this->redirect('Home/Index/index', '', 0);
                            }
                        } else {
                            //$data['error'] = 'Wrong email or password! Please try again!';
                            $this->error('Wrong password! Please try again!');
                        }

                    } else {
                        //$data['error'] = 'Wrong email or password! Please try again!';
                        $this->error('Wrong email! Please try again!');
                    }
                } else {  //fail to verify recaptcha
                    $this->error('Failed to verify your identity!');
                }
            } else {
                $this->error('Failed to submit your information!');
            }
        } else {
//            $this->assign($data);
            $this->redirect('Home/Index/index', '', 0);
        }
    }

    //recaptcha
    public function send_post($url, $post_data)
    {
        $postdata = http_build_query($post_data);
        $options = array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type:application/x-www-form-urlencoded',
                'content' => $postdata,
                'timeout' => 15 * 60 // 超时时间（单位:s）
            )
        );
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        return $result;
    }

    public function register(){
        $data['title'] = "Password Manager";

        if(IS_POST){
            $email = I('post.email', '');
            $nickname = I('post.nickname','');
            $password = I('post.password', 0);
            $password2 = I('post.password_2', 0);
            if ($email && $nickname && $password) {
                $User = M('user');
                $where['email'] = $email;
                $find = $User->where($where)->find();
                if($find) {
                    $this->error('This email has already registered! Please try another email or login using this email!');
                } else {
                    $user['email'] = $email;
                    $user['nickname'] = $nickname;
                    $user['status'] = 1;
                    $result = $User->data($user)->add();
                    if($result){
                        $UserAuthenticate = M("user_authenticate");
                        $ua['user_id'] = $result;
                        $ua['password'] = hash('sha256',$password);
                        $ua['password2'] = hash('sha256',$password2);
                        $result2 = $UserAuthenticate->data($ua)->add();
                        if($result2){
                            $content = "
                            Dear $nickname, <br/><br/>
                            Thanks for signing up for the Password Manager! You can now enjoy our all-in-one secure password managaging service!<br/><br/>
                            (If you receive this email without registered for our service, please contact us to report impersonation.)<br/><br/>
                            Best Regards,<br/>
                            Password Manager Team
                            ";
                            if(sendmail($email,'Welcome to Password Manager',$content,'The Password Manager Team')){
                            redirect('../Index/index', 3, 'Register successfully! Please wait for a moment...');}
                            else{
                                $res['code'] = 4;
                                $res['error'] = 'failed to add user';
                                $this->ajaxReturn($res);
                            }
                        } else {
                            $res['code'] = 2;
                            $res['error'] = 'failed to add user';
                            $this->ajaxReturn($res);
                        }
                    } else {
                        $res['code'] = 3;
                        $res['error'] = 'failed to add user';
                        $this->ajaxReturn($res);
                    }
                }
            }
        } else {
            $this->assign('data', $data);
            $this->display();
        }
    }

    public function forget(){
        $data['title'] = "Password Manager";

        if(IS_POST){
            $email = I('post.email', '');
            $nickname = I('post.nickname','');
            if ($email && $nickname) {
                $User = M('user');
                $where['email'] = $email;
                $where['nickname'] = $nickname;
                $find = $User->where($where)->find();
                $user_id = $find['user_id'];
                if($find) {
                    //generate random pw
                    $rand = randPassword();
                    //write to db
                    $Passwords = M(user_authenticate);
                    $where['email'] = $email;
                    $find1 = $Passwords->where($where)->find();

                    if ($find1){
                        $UserAuthenticate = M("user_authenticate");
                        $save['password'] = hash('sha256',$rand);
                        $where['user_id'] = $user_id;
                        $result = $UserAuthenticate->where($where)->data($save)->save();

                        if ($result){
                            //send email to user
                            $content = "
                            Dear $nickname, <br/><br/>
                            Your new password is: $rand<br/><br/>
                            Best Regards,<br/>
                            Password Manager Team
                            ";
                            if(sendmail($email,'Your password has been reset',$content,'The Password Manager Team')){
                                redirect('../Index/index', 3, 'Reset password successfully! An email is sent to you with new login password.');
                            }else{
                                $res['code'] = 4;
                                $res['error'] = 'failed to reset password';
                                $this->ajaxReturn($res);
                            }
                        }else{
                            $res['code'] = 6;
                            $res['error'] = 'failed to reset password';
                            $this->ajaxReturn($res);
                        }
                    }else{
                            $res['code'] = 5;
                            $res['error'] = 'failed to reset password';
                            $this->ajaxReturn($res);
                    }
                } else {
                    $this->error('Cannot find corresponding account!');
                }
            }
        } else {
            $this->assign('data', $data);
            $this->display();
        }
    }
}
