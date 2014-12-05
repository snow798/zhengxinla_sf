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

    <link href="<?php echo $__static; ?>/css/reset.css" rel="stylesheet">
    <link href="<?php echo $__static; ?>/css/basic.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="<?php echo $__static; ?>/js/html5.js"></script>
    <script src="<?php echo $__static; ?>/js/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo $__static; ?>/js/jquery-1.10.2.min.js"></script>
    <script src="<?php echo $__static; ?>/js/common.js"></script>

</head>

<body>

<neq name="ACTION_NAME" value="login">

<div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">      
      <span class="navbar-brand"></span> </div>
    <div class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/manage/">会员管理</a></li>
            <?php if ($issuper) { ?>
          <li><a href="/manage/admin">管理员账号</a>
            <?php } ?>
          <li><span><?php echo $mname; ?></span><a style="display:inline-block; padding-left:5px;" href="/manage/logout">[ 退出 ]</a></li>
      </ul>
    </div>
  </div>
</div>

</neq>
<hr/>
<div class="container" id="admin_cont">