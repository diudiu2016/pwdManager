<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
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
//        }
//    }
    public function index(){
        $data['title'] = "Password Manager";
        $this->assign('data', $data);
        $this->display();
    }
    public function logout() {
        set_logout();
        $this->redirect('Home/Index/index', '', 0);
    }

}