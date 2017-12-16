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

class GoodsType extends Common
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
            $validate = validate('Brand');
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


}