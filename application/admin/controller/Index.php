<?php
namespace app\Admin\controller;
use think\Session;
use app\admin\model\Admin;
class Index extends Base
{
    public function _initialize()
    {
       $this->user = Model('User');
    }

    public function index(){
        $user = Session::get('admin_user'); 
        if(isset($user)) {
            // 模板输出
            return  $this->fetch();
        } else {
            $this->redirect('index/login'); 
        }
    }

    public function login(){
        if ($this->request->isAjax()) {
            $user = input();
            $model = new Admin;
            if ($model->login($user)) {
                return 1; 
            } else {
                return 0;
            }

        }
        // 模板输出
        return view();
    }
    public function main(){
        // 模板输出
        return view();
    }
}