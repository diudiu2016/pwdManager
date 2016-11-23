<?php
namespace Customer\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize() {
        if (is_login()) {
            if(get_user_status() == C('USER_CUSTOMER_STATUS')) {
                $this->redirect('Customer/Index/index', '', 0);
            } else if(get_user_status() == C('USER_ADMINI_STATUS')) {
                //$this->redirect('Customer/Index/index', '', 0);
            } else {
                set_logout();
                $this->redirect('Home/Index/index', '', 0);
            }
        } else {
            $this->redirect('Home/Index/index', '', 0);
        }
    }
    public function index(){
        $this->_data['title'] = "Password Manager";
        $data['title'] = "User Page";
        $this->assign($this->_data);
        $this->assign('data',$data);
        $this->display();
    }
}