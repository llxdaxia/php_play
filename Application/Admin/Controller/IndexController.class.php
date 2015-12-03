<?php
namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $user = M('user');// 实例化Data数据模型
        $result = $user->find(1);
        $this->assign('result', $result);
        $this->display();
    }

    public function register()
    {
        echo "注册";
    }

    public function hello($name='thinkphp'){
        $this->assign('name',$name);
        $this->display();
    }
}