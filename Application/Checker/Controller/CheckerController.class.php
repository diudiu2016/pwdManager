<?php
namespace Checker\Controller;
use Think\Controller;
class CheckerController extends Controller {
    public function index(){
    	$data['title'] = "Password Strength Checker";
    	$this->assign('data',$data);
        $this->display();
    }
}