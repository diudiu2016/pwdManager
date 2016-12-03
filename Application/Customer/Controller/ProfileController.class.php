<?php
namespace Customer\Controller;
use Think\Controller;
class ProfileController extends Controller {
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
        $data['title'] = "My Profile";
        $this->assign('data',$data);
        $this->display();
    }

    //forget safety pw, confirm with email + primary pw
    public function forget(){
        $data['title'] = "Reset Safety Passwords";
        if(IS_POST){
            $Passwords = M('user_authenticate');
            $user_id = get_user_id();
            $password = randPassword();
            $safety = I('post.safety', 0);
            $email = I('post.email', '');
            $nickname =  I('post.name', '');

            $save['password2'] = hash('sha256',$password);

            $where['user_id'] = $user_id;
            $where['email'] = $email;
            $where['password'] = hash('sha256',$safety);

            $result = $Passwords->where($where)->data($save)->save();

            if($result){
                //send email to user
                $content = "
                Dear $nickname, <br/><br/>
                Your new safety password is: $password<br/><br/>
                Best Regards,<br/>
                Password Manager Team
                ";
                if(sendmail($email,'Your safety password has been reset',$content,'The Password Manager Team')){
                    redirect('../Profile', 3, 'Reset password successfully! An email is sent to you with new safety password.');
                }else{
                    $info['error'] = 'Fail to save the password, please try again!';
                    $this->assign('info', $info);
                    $this->display();
                }

                $info['message'] = 'Successfully save the password!';
                $this->assign('info', $info);
                $this->display();
            }else{
                $info['error'] = 'Fail to reset the password, please try again!';
                $this->assign('info', $info);
                $this->display();
            }
        } else {
            $this->assign('data',$data);
            $this->display();
        }
    }

    //reset login pw, confirm with email + safety pw
    public function editPrimary(){
        $data['title'] = "Edit Safety Passwords";
        if(IS_POST){
            $Passwords = M('user_authenticate');
            $user_id = get_user_id();
            $password = I('post.password', 0);
            $safety = I('post.safety', 0);
            $email = I('post.email', '');

            $save['password'] = hash('sha256',$password);

            $where['user_id'] = $user_id;
            $where['email'] = $email;
            $where['password2'] = hash('sha256',$safety);

            $result = $Passwords->where($where)->data($save)->save();

            if($result){
                $info['message'] = 'Successfully save the password!';
                $this->assign('info', $info);
                $this->display();
            }else{
                $info['error'] = 'Fail to save the password, please try again!';
                $this->assign('info', $info);
                $this->display();
            }
        } else {
            $this->assign('data',$data);
            $this->display();
        }
    }    

    //reset safety pw, confirm with email + old safety pw
    public function editSafety(){
        $data['title'] = "Edit Safety Passwords";
        if(IS_POST){
            $Passwords = M('user_authenticate');
            $user_id = get_user_id();
            $password = I('post.password', 0);
            $safety = I('post.safety', 0);
            $email = I('post.email', '');

            $save['password2'] = hash('sha256',$password);

            $where['user_id'] = $user_id;
            $where['email'] = $email;
            $where['password2'] = hash('sha256',$safety);

            $result = $Passwords->where($where)->data($save)->save();

            if($result){
                $info['message'] = 'Successfully save the password!';
                $this->assign('info', $info);
                $this->display();
            }else{
                $info['error'] = 'Fail to save the password, please try again!';
                $this->assign('info', $info);
                $this->display();
            }
        } else {
            $this->assign('data',$data);
            $this->display();
        }
    }    

}