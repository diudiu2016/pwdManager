<?php
namespace Customer\Controller;
use Think\Controller;
class PasswordController extends Controller {
    public function _initialize() {
        if (is_login()) {
            if(get_user_status() == C('USER_ADMINI_STATUS')) {
                $this->redirect('Admin/Index/index', '', 0);
            } else {
            }
        } else {
            $this->redirect('Home/Index/index', '', 0);
        }
    }
    public function index(){
        $data['title'] = "My Passwords";

        $Passwords = M('user_passwords');
        $user_id = get_user_id();
        $where['user_id'] = $user_id;
        $list = $Passwords->where($where)->select();

        if($list){
            $data['list'] = $list;
        }

        $this->assign('data',$data);
        $this->display();
    }
    public function check_safety_pwd(){
        if(IS_POST) {
            $salt = hash('sha256',I('post.pwd', ''));
            $UA = M('user_authenticate');
            $where['user_id'] = get_user_id();
            $where['password2'] = $salt;
            $result = $UA->where($where)->find();
            if($result){
                //if safety password matches
                $res['code'] = 0;
                $res['salt'] = $salt;
                $this->ajaxReturn($res);
            } else {
                $res['code'] = 1;
                $this->ajaxReturn($res);
            }
        }
    }

    public function check_item_pwd(){
        if(IS_POST) {
            //$pwd = I('post.pwd','');
            $pwd_id = I('post.id','');

            $UP = M('user_passwords');
            $where['user_id'] = get_user_id();
           // $where['password'] = $pwd;
            $where['password_id'] = $pwd_id;
            $result = $UP->where($where)->find();
            if($result){
                //if item password matches
                $res['code'] = 0;
                $res['pwd'] = $result['password'];
                //$res['salt'] = $salt;
                $this->ajaxReturn($res);
            } else {
                $res['code'] = 1;
                //$res['password'] = $pwd;
                $this->ajaxReturn($res);
            }
        }
    }

    public function add(){
        $data['title'] = "Add New Passwords";
        if(IS_POST){
            $Passwords = M('user_passwords');
            $add['item'] = I('post.item', '');
            $add['user_name'] = I('post.name','');
            $add['password'] = I('post.pwd', '');
            $add['user_id'] = get_user_id();
            //dump($add);
            $result = $Passwords->data($add)->add();
            if($result){
//                $info['message'] = 'Successfully save the password!';
//                $this->assign('info', $info);
//                $this->assign('data',$data);
//                $this->display();
                $res['code'] = 0;
                $this->ajaxReturn($res);
            } else {
//                $info['error'] = 'Fail to save the password, please try again!';
//                $this->assign('info', $info);
//                $this->assign('data',$data);
//                $this->display();
                $res['code'] = 1;
                $this->ajaxReturn($res);
            }
        } else {
            $this->assign('data',$data);
            $this->display();
        }
    }

    public function read_pwd(){
        if(IS_POST){
            $Passwords = M('user_passwords');
            $where['user_id'] = get_user_id();
            $where['password_id'] = I('post.pwd_id', 0);
            $result = $Passwords->where($where)->find();
            if($result){
                $res['code'] = 0;
                $res['pwd'] = $result['password'];
                $this->ajaxReturn($res);
            } else {
                $res['code'] = 1;
                $this->ajaxReturn($res);
            }
        }
    }
    public function read(){
        $info["pw"]="";
        $info["found"]="false";
        if (IS_GET) {
            $pwd_id = I('get.pwd_id', 0);

            $Passwords = M(user_authenticate);
            $user_id = get_user_id();
            $where['user_id'] = $user_id;
            $find = $Passwords->where($where)->find();
            $pw2 = $find['password2'];
            $pw2Length = strlen($pw2);
            
            $ranDigit = array(rand(1, $pw2Length),0,0);

            while ($ranDigit[1]==0 || $ranDigit[1]==$ranDigit[0]){
                $ranDigit[1] = rand(1, $pw2Length);
            }

            while ($ranDigit[2]==0 || $ranDigit[2]==$ranDigit[0]|| $ranDigit[2]==$ranDigit[1]){
                $ranDigit[2] = rand(1, $pw2Length);
            }

            sort($ranDigit);

            if ($find) {
                $data['title'] = "Read Password";
                $info['randDigit1'] = $ranDigit[0];
                $info['randDigit2'] = $ranDigit[1];
                $info['randDigit3'] = $ranDigit[2];
                $info['pwd_id'] = $pwd_id;
                $this->assign('info', $info);
                $this->assign('data', $data);
                $this->display();
            } else {
                $res['code'] = 1;
                $res['error'] = 'record not found';
                $this->ajaxReturn($res);
            }
        }elseif (IS_POST) {
            $save['p1'] = I('post.p1','');
            $save['p2'] = I('post.p2','');
            $save['p3'] = I('post.p3','');
            $save['p4'] = I('post.p4','');
            $save['p5'] = I('post.p5','');
            $save['p6'] = I('post.p6','');
            $pwd_id = I('post.p7',0);

            $Passwords = M(user_authenticate);
            $user_id = get_user_id();
            $where['user_id'] = $user_id;
            $find = $Passwords->where($where)->find();
            $pw2 = $find['password2'];
            //ck if 2nd paw match

            $result = (($pw2{$save['p4']-1} == $save['p1']) && ($pw2{$save['p5']-1} == $save['p2']) && ($pw2{$save['p6']-1} == $save['p3']));
            if($result){
                //get requested pw
                $Passwords = M('user_passwords');
                $where['password_id'] = $pwd_id;
                $innerfind = $Passwords->where($where)->find();
                $requestedPw = $innerfind['password'];

                if ($innerfind){
                    $info['pw'] = $requestedPw;
                    $info["found"]="true";
                    $this->assign('info', $info);
                    $data['title'] = "Successfully Read Password";
                    $this->assign('data',$data);
                    $this->display();
                }else{
                    //cannot find pw (should be impossible case)
                    $info['error'] = "Cannot find requested password";
                    $this->assign('info', $info);
                    $data['title'] = "Read Password";
                    $this->assign('data',$data);
                    $this->display();
                }
            } else {
                //else, show pw incorrect
                $info['error'] = 'Incorrect second passord, please try again! ';
                $this->assign('info', $info);
                $data['title'] = "Read Password";
                $this->assign('data',$data);
                $this->display();
            }
        }else {
            $res['code'] = 2;
            $res['error'] = 'incorrect operation';
            $this->ajaxReturn($res);
        }
    }

    public function edit(){
        if (IS_GET) {
            $pwd_id = I('get.pwd_id', 0);

            $Passwords = M('user_passwords');
            $user_id = get_user_id();
            $where['password_id'] = $pwd_id;
            $where['user_id'] = $user_id;
            $find = $Passwords->where($where)->find();
            if ($find) {
                $data['title'] = "Edit Password";
                $info['item'] = $find['item'];
                $info['name'] = $find['user_name'];
                $info['password'] = $find['password'];
                $info['pwd_id'] = $pwd_id;
                $this->assign('info', $info);
                $this->assign('data', $data);
                $this->display();
            } else {
                $res['code'] = 1;
                $res['error'] = 'record not found';
                $this->ajaxReturn($res);
            }
        } elseif (IS_POST) {
            $Passwords = M('user_passwords');
            $save['item'] = I('post.item', '');
            $save['user_name'] = I('post.name','');
            $save['password'] = I('post.password', '');
            $save['user_id'] = get_user_id();
            $where['password_id'] = I('post.id',0);
            $result = $Passwords->where($where)->data($save)->save();
            if($result){
                $res['code'] = 0;
                $this->ajaxReturn($res);
            } else {
                $res['code'] = 1;
                $res['id'] = $save['password_id'];
                $this->ajaxReturn($res);
            }
//            if($result){
//                $info['message'] = 'Successfully save the password!';
//                $this->assign('info', $info);
//                $data['title'] = "Edit Password";
//                $this->assign('data',$data);
//                $this->display();
//            } else {
//                $info['error'] = 'Fail to save the password, please try again!';
//                $this->assign('info', $info);
//                $data['title'] = "Edit Password";
//                $this->assign('data',$data);
//                $this->display();
//            }
        } else {
            $res['code'] = 2;
            $res['error'] = 'failed to submit';
            $this->ajaxReturn($res);
        }
    }

    public function delete(){
        if (IS_GET) {
            $pwd_id = I('get.pwd_id', 0);

            $Passwords = M('user_passwords');
            $user_id = get_user_id();
            $where['password_id'] = $pwd_id;
            $where['user_id'] = $user_id;

            $find = $Passwords->where($where)->find();
            if ($find) {
                $data['title'] = "Edit Password";
                $Passwords->delete($pwd_id);
                $info['message'] = "Delete the record successfully!";
                $this->assign('info', $info);
                $this->redirect('Customer/Password/index', '', 0);
            } else {
                $res['code'] = 1;
                $res['error'] = 'record not found';
                $this->ajaxReturn($res);
            }
        } else {
            $res['code'] = 2;
            $res['error'] = 'failed to submit';
            $this->ajaxReturn($res);
        }
    }

}