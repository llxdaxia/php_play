<?php
namespace Admin\Controller;

use Think\Controller;

class FormController extends Controller
{

    //这里通过HTML中的表单提交来调用insert函数实现数据的写入
    //插入，增
    public function insert()
    {
        $Form = D('user');  //这里的user表示表名think_user，对应配置文件的表前缀think_
        if ($Form->create()) {  //表是否创建
            $result = $Form->add();   //插入数据到数据库，如果插入成功返回id，如果没有id，返回插入的数值
            if ($result) {
                $this->success("数据添加成功");
            } else {
                $this->error("数据添加失败");
            }
        } else {
            $this->error($Form->getError());
        }
    }

    //读取数据
    public function read($id = 1)  //默认id = 1的数据
    {
        $Form = M('user');  //读取think_user表
        $data = $Form->find($id);   //操作id = $id 的数据
        if ($data) {
            $this->assign('result', $data);
        } else {
            $this->error("数据错误，sb" + $Form->getError());
        }
        $this->display();  //当调用display方法的时候就会对应的HTML文件，并且必须与方法同名的文件(read.html)
    }

    //编辑
    public function edit($id = 1)   //url调用这里的时候应该是同时这里和view层的edit.html
    {
        $Form = M('user');
        $result = $Form->find($id);
        if($result){
            $this->assign('result', $result);
            $this->display();
        }else{
            $this->error("找不到这个数据");
        }

    }

    //更新数据库数据
    public function update()
    {
        $Form = D('user');
        if ($Form->create()) {
            $result = $Form->save();
            if ($result) {
                $this->success("更新成功");
            } else {
                $this->error("写入错误");
            }
        } else {
            $this->error($Form->getError());
        }
    }

    public function delete()
    {
        $Form = M('form');
        $Form->delete('10,11,12,13,14,15');   //这里表示删除主键为3的数据

        $User = M('user');   //实例化user对象
        $User->where('id = 4')->delete();  //删除id = 3的数据
        $User->delete('1,2,4');  //删除主键为1,2,4的数据
        $User->where('name = "fuck"')->delete();   //删除了name=fuck的所有数据
    }

    public function select(){
        $User = D('user');
        //数组方式查询,最常用的
        $condition['name'] = 'fuck';
        $condition['password'] = 'fuck';
        $condition['_logic'] = 'or';   //在默认情况下是AND
        $result = $User->where($condition)->select();
//        //对象方式查询:以stdClass()内置对象为例
//        $condition1 = new \stdClass();
//        $condition1->name = 'fuck';
//        $condition1->password = 'fuck';
//        $result = $User->where($condition1)->select();
        if($result){
            $this->assign('result',$result);
            echo json_encode($result);
            var_dump($result);
            $this->display();
        }else{
            $this->error("表中没有这样的数据");
        }

    }
}









