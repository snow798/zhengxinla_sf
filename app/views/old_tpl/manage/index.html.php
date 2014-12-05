<?php echo $this->partial('manage/header'); ?>
<script src="<?php echo $__static; ?>/js/jquery.template.min.js"></script>
    <div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">会员管理<a href="/manage/addmember" class="fr float_right">新增会员</a></div>
	  <!-- Table -->
	  <div class="panel-body" id="memberlist">	  
		  <div class="memberlist"></div>
		  <div class="pagination"></div>
          <?php echo $this->partial('manage/memberlist_js'); ?>
          <?php echo $this->partial('public/page_js'); ?>
	  </div>
	</div>
<script type="text/javascript">
$(function(){

	var box = $('#memberlist'),
		p = 1,
		limit = 5;
//载入会员列表
	function loadList(opts){
		var data = {p:p, limit:limit};
		if(typeof opts == 'object')
			$.extend(data, opts);
		$.ajax({
			url : '/manage/index',
			type : 'post',
			dataType : 'json',
			data : data,
			success : function(res){
                console.log(res);
				if(res['ret'] > 0){
					var html = $.template('memberlist_js', res.data.members),
						pagehtml  = $.template('pagelist_js', res.data.members);
					box.find('.memberlist').html(html);
					box.find('.pagination').html(pagehtml);
				}
			}
		});
	};

	loadList();

	var pages = page();
	pages.click(function(n){
		p = n;
		loadList();
	});
//删除会员信息 目前不需要
	/*box.delegate('.delete','click',function(){
		if(!confirm("确定要删除该会员吗？")){
			return false;
		}
		var memberid = $(this).attr('memberid');		
		$.ajax({
			url : '/manage/delmember',
			type : 'post',
			dataType : 'json',
			data : {
				memberid : memberid
			},
			success : function(res){
				if(res['ret'] > 0){
					alert(res['msg']);
					location.reload();
				}else{
					alert(res['msg']);
				}
			}
		})
		return false;
	});*/
	function toggle(parent, type){
		if(typeof type == 'undefined')
			type = 'show';
		if(type == 'show'){
			parent.find('.input-text, .delete, .edit').addClass('hidden');
			parent.find('[name=username],[name=password],[name=companyname],[name=status],.save').removeClass('hidden');
		}else if(type == 'hide'){
			parent.find('.input-text, .delete, .edit').removeClass('hidden');
			parent.find('[name=username],[name=password],[name=companyname],[name=status],.save').addClass('hidden');
		}
		return false;
	}
	box.delegate('.edit', 'click', function(){
		var memberid = $(this).attr('memberid'),
			parent = $(this).closest('tr');
		toggle(parent);
		return false;
	});
    //修改会员信息、保存信息
	box.delegate('.save', 'click', function(){
		var memberid = $(this).attr('memberid'),
			parent = $(this).closest('tr'),
			username = parent.find('[name=username]'),
			password = parent.find('[name=password]'),
			companyname = parent.find('[name=companyname]'),
			status = parent.find('[name=status]');
		if(username.val() == username.attr('default') && companyname.val() == companyname.attr('default') 
			&& password.val() == '' && status.val() == parseInt(status.attr('default'))){
			toggle(parent, 'hide');
			return false;
		}
		var data = {
			memberid : memberid,
			username : username.val(),
			companyname : companyname.val(),
			status : status.val()
		};
		if(password.val() != ''){
			$.extend(data, {
				password : password.val()
			})
		}
		$.ajax({
			url : '/manage/savemember',
			type : 'post',
			dataType : 'json',
			data : data,
			success : function(res){
				if(res['ret'] > 0){
					alert(res['msg']);					
					loadList();
				}else{
					alert(res['msg']);
				}
			}
		})
		return false;
	});
});
</script>

<?php echo $this->partial('manage/footer'); ?>