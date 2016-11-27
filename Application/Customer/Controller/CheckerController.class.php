<?php
namespace Customer\Controller;
use Think\Controller;
class CheckerController extends Controller {
    public function index(){
        $data['title'] = "Password Checker";
        $this->assign('data',$data);
        $this->display();
    }
}