<?php echo $this->partial('manage/header'); ?>
<script src="<?php echo $__static; ?>/js/jquery.template.min.js"></script>
    <div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">管理员列表<a href="/manage/addadmin" class="fr float_right">新增管理员</a></div>
	  <!-- Table -->
	  <div class="panel-body" id="adminlist">
		  <div class="adminlist"></div>
		  <div class="pagination"></div>
          <?php echo $this->partial('manage/adminlist_js'); ?>
          <?php echo $this->partial('public/page_js'); ?>

      </div>
	</div>

<script type="text/javascript">
$(function(){

	var box = $('#adminlist');
// 管理员会员信息加载
	function loadList(opts){
		var data = {};
		if(typeof opts == 'object')
			$.extend(data, opts);
		$.ajax({
			url : '/manage/admin',
			type : 'post',
			dataType : 'json',
			data : data,
			success : function(res){
                console.log(res);
				if(res['ret'] > 0){
					var html = $.template('adminlist_js', res.data),
						pagehtml  = $.template('pagelist_js', res.data);
					box.find('.adminlist').html(html);
					box.find('.pagination').html(pagehtml);
				}
			}
		});
	};

	loadList();

	var p = page();
	p.click(function(n){
		loadList({
			p : n
		});
	});
//删除管理员
	box.delegate('.delete', 'click', function(){
		if(!confirm('确定删除该管理员吗？')){
			return false;
		}
		var mid = $(this).attr('mid');
		$.ajax({
			url : '/manage/deladmin',
			type : 'POST',
			dataType : 'json',
			data : {
				mid : mid
			},
			success : function(res){
                console.log(res);
				if(res['ret'] > 0){
					alert(res['msg']);
					loadList();
				}else{
					alert(res['msg']);
				}
			}
		});
		return false;
	});

	function toggle(parent, type){
		if(typeof type == 'undefined')
			type = 'show';
		if(type == 'show'){
			parent.find('.input-text,.delete,.edit').addClass('hidden');
			parent.find('[name=username], [name=password], .save').removeClass('hidden');
		}else if(type == 'hide'){
			parent.find('.input-text,.delete,.edit').removeClass('hidden');
			parent.find('[name=username], [name=password], .save').addClass('hidden');
		}
	}
	box.delegate('.edit', 'click', function(){
		var parent = $(this).closest('tr');
		toggle(parent);
		return false;
	});
//修改管理员信息、保存信息
	box.delegate('.save', 'click', function(){
		var parent = $(this).closest('tr'),
			username = parent.find('[name=username]'),
			password = parent.find('[name=password]'),
			mid = $(this).attr('mid');
		if(username.val() == username.attr('default') && password.val() == ''){
			toggle(parent, 'hide');
			return false;
		}
		var data = {
			mid : mid,
            password : password.val()
		};
		if(password.val() != ''){
			$.extend(data, {
				password : password.val()
			})
		}
		$.ajax({
			url : '/manage/saveadmin',
			type : 'post',
			dataType : 'json',
			data : data,
			success : function(res){
                console.log(res);
				if(res['return'] > 0){
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