<?php
namespace Customer\Controller;
use Think\Controller;
class GeneratorController extends Controller {
    public function index(){
        $data['title'] = "Password Generator";
        $this->assign('data',$data);
        $this->display();
    }
}