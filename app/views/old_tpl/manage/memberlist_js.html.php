<script type="text/html" id="memberlist_js">
	
	<table class="table table-striped table-hover">
    <tr>
	    <td  width="23%">用户名</td>
	    <td  width="17%">公司名称</td>
	    <td  width="10%">联系人</td>
	    <td  width="10%">联系电话</td>
	    <td  width="10%">Email</td>
	    <td  width="10%">申请时间</td>
	    <td width="10%">状态</td>
	    <td  width="10%">操作</td>
    </tr>
    {each list as member i}
	    <tr>
	    <td  >
	    	<span class="input-text">{member.username}</span>
	    	<input type="text" class="form-control hidden" style="width:100px; display:inline-block;" name="username" placeholder="账号" default="{member.username}" value="{member.username}">
	    	<input type="password" class="form-control hidden" style="width:100px; display:inline-block;" name="password" placeholder="密码">
	    </td>
	    <td >
	    	<span class="input-text">{member.companyname}</span>
	    	<input type="text" class="form-control hidden " name="companyname" placeholder="账号" default="{member.companyname}" value="{member.companyname}">
	    </td>
	    <td>{member.contact1}</td>
	    <td>{member.contact1_phone}</td>
	    <td>{member.email}</td>
	    <td>{Common.formatDate(member.addtime)}</td>
	    <td>
	    	<span class="input-text">{Common.formatMemStatus(member.status)}</span>
	    	<select class="form-control hidden" name="status" default="{member.status}">	    		
	    		<option value=1 {if member.status==1}selected{/if}>已通过</option>
	    		<option value=2 {if member.status==2}selected{/if}>未通过</option>	    
	    		<option value=3 {if member.status==3}selected{/if}>未审核</option>		
	    	</select>
	    </td>
	    <td  >
		   <!-- <a href="#" class="label label-default hao_label delete" memberid="{member.memberid}">删除</a> -->
			<a href="#" class="label label-danger hao_label edit">修改</a>
			<button class="btn btn-default save hidden" memberid="{member.memberid}">保存</button>
	    </td>
	    </tr>
    {/each}
  </table>
	
</script>