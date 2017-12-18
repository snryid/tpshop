<?php
/**
 * 商城处理后台
 * ============================================================================
 * 版权所有 
 * 项目网址: 
 * ============================================================================
 * $Author: Beckyang $
 * $creation time:2017-12-14 $
 *  
*/
namespace app\shopadmin\controller;
use think\Controller;

class GoodsBrand extends Common
{
    public function lst()
    {
    	$brandRes=db('brand')->order('id DESC')->paginate(6);
        // dump($brandRes);
    	$this->assign([
    		'brandRes'=>$brandRes,
    		]);
        return view('list');
    }

    public function add()
    {
        if (request()->isPost()) {
            $data = input('post.');
            dump($data);
            if ((($_FILES['brand_img']['type'] == "image/jpeg") || ($_FILES['brand_img']['type'] == "image/png")) && ($_FILES['brand_img']['size'] < 200000) ) {
                
            }
        }
    	
        return view('add');
    }

    public function edit()
    {
        if(request()->isPost()){
            $data=input('post.');
            // $data['brand_url'];  http://
            if($data['brand_url'] && stripos($data['brand_url'],'http://') === false){
                $data['brand_url']='http://'.$data['brand_url'];
            }
            //处理图片上传
            if($_FILES['brand_img']['tmp_name']){
                $oldBrands=db('brand')->field('brand_img')->find($data['id']);
                $oldBrandImg=IMG_UPLOADS.$oldBrands['brand_img'];
                if(file_exists($oldBrandImg)){
                    @unlink($oldBrandImg);
                }
                $data['brand_img']=$this->upload();
            }
            //验证
            $validate = validate('GoodsBrand');
            if(!$validate->check($data)){
                $this->error($validate->getError());
            }
            $save=db('brand')->update($data);
            if($save !== false){
                $this->success('修改品牌成功！','lst');
            }else{
                $this->error('修改品牌失败！');
            }
            return;
        }
        $id=input('id');
        $brands=db('brand')->find($id);
        $this->assign([
            'brands'=>$brands,
            ]);
           return view();
    }

    public function del()
    {
    	
        
    }


    public function upload(){
    // 获取表单上传文件 例如上传了001.jpg
    $file = request()->file('image');
    // 移动到框架应用根目录/public/uploads/ 目录下
    $info = $file->validate(['size'=>15678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads');
    if($info){
        // 成功上传后 获取上传信息
        // 输出 jpg
        echo $info->getExtension();
        // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
        echo $info->getSaveName();
        // 输出 42a79759f284b767dfcb2a0197904287.jpg
        echo $info->getFilename(); 
    }else{
        // 上传失败获取错误信息
        echo $file->getError();
    }
}

}