<?php /*%%SmartyHeaderCode:467282878510411567434c6-97336616%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cc2615ae7a180382ff6beedb27ea9a8d3a5a15d4' => 
    array (
      0 => '/home/j/NetBeansProjects/yangda/view/menu.tpl',
      1 => 1359116676,
      2 => 'file',
    ),
    'e79f370a80cd415eb56511e46f9306b3bd1718f5' => 
    array (
      0 => '/home/j/NetBeansProjects/yangda/view/head.tpl',
      1 => 1359132757,
      2 => 'file',
    ),
    '78686fa2a0fe7a42155e70500fb2cee0762b3d9e' => 
    array (
      0 => '/home/j/NetBeansProjects/yangda/view/CONFIGS',
      1 => 1358561695,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '467282878510411567434c6-97336616',
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_51041156ed2fc3_82705669',
  'cache_lifetime' => 3600,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51041156ed2fc3_82705669')) {function content_51041156ed2fc3_82705669($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  xml:lang="zh-CN" lang="zh-CN">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        
        
        <link href="./css/common.css" rel="stylesheet" type="text/css" />
        <link href="./css/menu.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="./images/favicon.ico" type="image/ico" />

        
        
        <script type="text/javascript" src="./script/jquery.js"></script> 
        <script type="text/javascript" src="./script/menu.js"></script>
        <script type="text/javascript" src="./script/common.js"></script>
        
        <title>扬州大学党校网上测试平台</title>

        
</head>
<body>
    <style type="text/css">

    </style>
    <div class="menu_top">
        <div  class="log_info"><span>陈琳  同学，您好</span><img src="images/log_out.png" title="退出" class="log_out"></img></a>
        </div>
    </div>
    <div id="menu">
        <ul class="menu">
            <!-- 学生导航  
            <li><a href="" class="parent"><span >&nbsp;&nbsp;首页通知&nbsp;&nbsp;</span></a></li>
            <li><a href="" class="parent"><span >&nbsp;&nbsp;个人资料&nbsp;&nbsp;</span></a></li>
            <li><a href="" class="parent"><span>&nbsp;&nbsp;修改密码&nbsp;&nbsp;</span></a></li>
            <li><a href="" class="parent"><span >&nbsp;&nbsp;参加考试&nbsp;&nbsp;</span></a></li>
            <li><a href="" class="parent"><span >&nbsp;&nbsp;成绩查询&nbsp;&nbsp;</span></a></li>
           结束 -->


            <!-- 管理员导航 -->
            <li><a href="" class="parent"><span >&nbsp;&nbsp;首页通知&nbsp;&nbsp;</span></a>
            </li>
            <li><a href="javascript:void(0);" class="parent"><span >&nbsp;&nbsp;用户设定&nbsp;&nbsp;</span></a>
                <ul>
                    <li><a href="" ><span>添加管理员</span></a>
                    </li>
                    <li><a href=""><span>删除管理员</span></a>
                    </li>
                    <li><a href=""><span>查看管理员</span></a>
                    </li>          
                </ul>

            </li>
            <li><a href="javascript:void(0);" class="parent"><span >&nbsp;&nbsp;学员管理&nbsp;&nbsp;</span></a>
                <ul>
                    <li><a href="" ><span>考试分配</span></a>
                    </li>
                    <li><a href=""><span>查看修改</span></a>
                    </li>        
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="parent"><span >&nbsp;&nbsp;试题维护&nbsp;&nbsp;</span></a>
                <ul>
                    <li><a href="javascript:void(0);" class="parent" ><span>选择题维护</span></a>
                        <ul>
                            <li><a href="" ><span>添加选择题</span></a>
                            </li>
                            <li><a href=""><span>查询选择题</span></a>
                            </li>        
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="parent" ><span>判断题维护</span></a>
                        <ul>
                            <li><a href="" ><span>添加判断题</span></a>
                            </li>
                            <li><a href=""><span>查询判断题</span></a>
                            </li>        
                        </ul>
                    </li> 
                    <li><a href="javascript:void(0);" class="parent" ><span>解答题维护</span></a>
                        <ul>
                            <li><a href=""><span>添加解答题</span></a>
                            </li>
                            <li><a href=""><span>查看解答题</span></a>
                            </li>        
                        </ul>
                    </li>
                    <li><a href="javascript:void(0);" class="" ><span>添加下载中级试卷</span></a>
                    </li>           
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="parent"><span >&nbsp;&nbsp;考试管理&nbsp;&nbsp;</span></a>
                <ul>
                    <li><a href="" ><span>考试设定</span></a>
                    </li>
                    <li><a href=""><span>考试查看</span></a>
                    </li>
                    <li><a href="" ><span>试卷批阅</span></a>
                    </li>
                    <li><a href=""><span>成绩统计</span></a>
                    </li>             
                </ul>
            </li>
            <li><a href="" class="" ><span>修改密码</span></a>
            </li>
            <li><a href="" class="" ><span>学院更改</span></a>
            </li> 
            <li><a href="" class="" ><span>通知发布</span></a>
            </li>  
            <li><a href=""><span>&nbsp;&nbsp;问题反馈&nbsp;&nbsp;</span></a></li>
            <!-- 结束 -->
        </ul>

    </div>
    <br/>
    <a  style="display:none" href="http://apycom.com/"></a>
    <div class="container">
<?php }} ?>