<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="" />
<meta name="description" content="">
<title>一起好借款人查询系统</title>
<!-- <link href="<?php echo $__static; ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php echo $__static; ?>/css/reset.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo $__static; ?>/css/style.css" > -->

<link href="<?php echo $__static; ?>/css/font-lato.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $__static; ?>/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $__static; ?>/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css" />
<link href="<?php echo $__static; ?>/css/aui-font.css" media="all" rel="stylesheet" type="text/css" />

<link rel="stylesheet" type="text/css" href="<?php echo $__static; ?>/css/module/header/header.css" />
<link href="<?php echo $__static; ?>/css/reset.css" rel="stylesheet">
<!--[if lt IE 9]>
 <script src="<?php echo $__static; ?>/js/html5.js"></script>
 <script src="<?php echo $__static; ?>/js/respond.min.js"></script>
<![endif]-->
<script src="<?php echo $__static; ?>/js/common.js"></script>
<script src="<?php echo $__static; ?>/js/jquery-1.10.2.min.js"></script>
</head>

<body>
<!-- 
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <span class="navbar-brand">一起好借款人明细查询</span> 
    </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <if condition="empty($_SESSION['memberid'])">
            <li><a href="/member/apply">申请加入</a></li>
            <li><a href="/member/login">登录</a></li>
        <else/>
            <li><a href="/search">查询</a></li>
            <li><a href="/loan/add">新增借款</a></li>
            <li><a href="/member">用户中心</a></li>
            <li><span>{$Think.session.username}</span><a style="display:inline-block; padding-left:5px;" href="/member/logout">[ 退出 ]</a></li>
        </if>       
      </ul>
    </div>
  </div>
</div>
 -->

<!-- Navigation -->     
<div class="aui">
    <?php echo $this->partial('module/navigation-out'); ?>
</div>
<hr/>
<!-- End Navigation -->

<script type="text/javascript">

</script>

<div class="container">