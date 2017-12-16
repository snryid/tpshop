<?php
namespace app\shopadmin\controller;

use auth\Auth;
use think\Controller;
use think\Image;
use think\Request;

header("Content-type: text/html; charset=utf-8");
class Common extends Controller
{
    public $config;

    public function _initialize()
    {
        
        $request = Request::instance();
        $module  = $request->module();
        $con     = $request->controller();
        $action  = $request->action();
        $name    = $module . '/' . $con . '/' . $action; //组合规则name

        $this->assign([
            'con'  => $con,
            'view' => $action,
            'name' => $name,
        ]);
        

    }

    public function getConf()
    {
        $confRes  = array();
        $_confRes = db('conf')->field('ename,value')->select();
        foreach ($_confRes as $v) {
            $confRes[$v['ename']] = $v['value'];
        }
        $this->config = $confRes;
    }

    public function admin_icon()
    {
        $where['id'] = session('id');
        $path        = db('admin')->where($where)->find();
        $this->assign('admin_icon', $path['admin_icon']);
    }

    /**
     * 生成缩略图
     * @param  [type] $path         [打开文件路劲]
     * @param  [type] $thumb_path   [新的路径]
     * @return [string]             [缩略图路径]
     */
    public function image_thumb($path, $type, $thumb_path)
    {
        $image = Image::open(ROOT_PATH . 'public' . $path);
        switch ($type) {
            case 'image':
                $image->thumb(300, 300, Image::THUMB_SCALING)->save(ROOT_PATH . 'public' . $thumb_path);
                break;
        }
        return $thumb_path;
    }

}
