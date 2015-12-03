<?php
namespace LazyMan\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8');
    }

    /**
     * 注册
     */
    public function register()
    {
        $name = I('post.name');
        $password = I('post.password');
        $User = D('user');
        if (empty($name) || empty($password)) {
            echo json_encode(array(
                'status' => '203',
                'info' => '参数不能为空'
            ));
            return;
        }
        if ($User->create()) {
            $condition['name'] = $name;
            if ($User->where($condition)->select()) {
                echo json_encode(array(
                    'status' => '204',
                    'info' => '用户名已注册'
                ));
                return;
            }
            $data['name'] = $name;
            $data['password'] = $password;
            $ok = $User->add($data);
            if ($ok) {
                $result = array(
                    'status' => '200',
                    'info' => 'success'
                );
            } else {
                $result = array(
                    'status' => '201',
                    'info' => '插入失败'
                );
            }

        } else {
            $result = array(
                'status' => '202',
                'info' => '表不存在'
            );
        }
        echo json_encode($result);
    }

    /**
     * 登录
     */
    public function login()
    {
        $name = I('post.name');
        $password = I('post.password');

        $User = D('user');
        $condition['name'] = $name;
        $condition['password'] = $password;
        $result = $User->where($condition)->select();
        if (empty($name) || empty($password)) {
            echo json_encode(array(
                'status' => 203,
                'info' => '参数不能为空'
            ));
            return;
        }
        if ($result) {
            echo json_encode(array(
                'status' => 200,
                'info' => 'success',
                'data' => $result
            ));
        } else {
            echo json_encode(array(
                'status' => 201,
                'info' => '用户名或密码错误'
            ));
        }
    }
}