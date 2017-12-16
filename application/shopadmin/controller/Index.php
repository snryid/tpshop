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

use think\db;
use think\Request;

class Index extends Common
{
	function index(){
		$request = Request::instance();
        $ip      = $request->ip();

        $info = array(
            'language'             => $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            'OS'                   => PHP_OS,
            'server_software'      => $_SERVER["SERVER_SOFTWARE"],
            'PHP_move'             => php_sapi_name(),
            'remote_port'          => $_SERVER['SERVER_PORT'],
            'ThinkPHP'             => THINK_VERSION,
            'updata'               => ini_get('upload_max_filesize'),
            'overtime'             => ini_get('max_execution_time') . '秒',
            'severTime'            => date("Y年n月j日 H:i:s"),
            'BJtime'               => gmdate("Y年n月j日 H:i:s", time() + 8 * 3600),
            'ServerName'           => $_SERVER['SERVER_NAME'],
            'IP'                   => gethostbyname($_SERVER['SERVER_NAME']),
            'memory'               => round((disk_free_space(".") / (1024 * 1024)), 2) . 'M',
            'register_globals'     => get_cfg_var("register_globals") == "1" ? "ON" : "OFF",
            'magic_quotes_gpc'     => (1 === get_magic_quotes_gpc()) ? 'YES' : 'NO',
            'magic_quotes_runtime' => (1 === get_magic_quotes_runtime()) ? 'YES' : 'NO',
        );

        $this->assign('info', $info);
        $this->assign('ip', $ip);
		return view();
	}
}