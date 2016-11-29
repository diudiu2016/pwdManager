<?php
namespace Home\Controller;
use Think\Controller;
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
                        set_login($find['user_id'],$find['nickname'], $find['status']);
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

            } else {
                $this->error('Failed to submit your information!');
            }
        } else {
//            $this->assign($data);
            $this->redirect('Home/Index/index', '', 0);
        }
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
                            redirect('../Index/index', 3, 'Register successfully! Please wait for a moment...');
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

}