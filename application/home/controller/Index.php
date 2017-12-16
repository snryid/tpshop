<?php
namespace app\home\controller;

use think\View;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
    	return $this->fetch('index');
    }
}
