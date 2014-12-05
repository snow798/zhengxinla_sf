<div class="container-fluid top-bar">
  <div class="pull-right">
    <ul class="nav navbar-nav pull-right" id="is_login">
      <li class="dropdown notifications">
        <a class="bar-button" href="/search">
          <span class="fa fa-fw fa-search hidden-md hidden-lg"></span>
          <p class="hidden-xs hidden-sm">查询</p>
        </a>
      </li>
      <li class="dropdown notifications">
        <a class="bar-button" href="/loan/add">
          <span class="fa fa-fw fa-plus hidden-md hidden-lg"></span>
          <p class="hidden-xs hidden-sm">新增借款</p>
        </a>
      </li>
      <li class="dropdown notifications">
        <a class="bar-button" href="/member">
          <span class="fa fa-fw fa-home hidden-md hidden-lg"></span>
          <p class="hidden-xs hidden-sm">用户中心</p>
        </a>
      </li>
      <li class="dropdown notifications">
        <!-- <img width="34" height="34" src="images/avatar-male.jpg" /> -->
        <i class="bar-button">
          <p><?php echo $info['username']; ?></p>
        </i>
      </li>
      <li class="dropdown notifications">
        <a class="bar-button" href="/member/logout">
          <span class="fa fa-sign-out hidden-md hidden-lg"></span>
            <p class="hidden-xs hidden-sm">[退出]</p>
        </a>
      </li>
    </ul>

     <!-- <ul class="nav navbar-nav pull-right" id="is_logout" style="display: none;">

          <li class="dropdown notifications">
            <a class="bar-button" href="/member/apply">
              <p class="">申请加入</p>
            </a>
          </li>
          <li class="dropdown notifications">
            <a class="bar-button" href="/member/login">
              <p class="">登录</p>
            </a>
          </li>

      </ul>-->
  </div>
</div>
<!--
<script>
    $(function(){
    var is_userID= "<?php echo $info['memberid']; ?>";
        if(is_userID){
           $('#is_login').show();
        }else{
            $('#is_logout').show();
        };
    })
</script>-->
