<?php echo $this->partial('public/header'); ?>


<form id="search-form" class="bs-example bs-example-form" action="/search" method="POST" name="search">
<div class="row">
	<i class="logo hidden-xs hidden-sm"></i>
	<i class="logo hidden-md hidden-lg"></i>
</div>

<div class="row hao_row">
  	<div class="col-xs-12 col-md-4 m-b-10">
    	<input required="required" type="text" maxlength="18" class="form-control" name="keyword" placeholder="请输入身份证号码">
  	</div>
  	<div class="col-xs-12 col-md-4 m-b-10">
    	<input required="required" type="text" maxlength="8" class="form-control" name="name" placeholder="姓名">
  	</div>
  	<div class="col-xs-12 col-md-3 m-b-10">
        <select class="form-control">
            <?php foreach ($reason as $key => $val) { ?>
            <option value="<?php echo $key; ?>"><?php echo $val; ?></option>
            <?php } ?>
        </select>
  	</div>
  	<div class="col-xs-12 col-md-1 m-b-10">
    	<button class="col-xs-12 btn btn-primary"  type="submit" id="search-submit">查询</button>
  	</div>
	</div>
</form>
<!--<div class="bs-example tooltip-demo">
    <div class="bs-example-tooltips">
        <button title="Tooltip on right" data-placement="right" data-toggle="tooltip" class="btn btn-default" type="button">右侧Tooltip</button>
    </div>-->
</div>
<?php echo $this->partial('public/globalscript'); ?>

<script type="text/javascript">
$('#search-form').submit(function(){
	// 新开一个页面
    var keyword = $('[name=keyword]'),
           name = $('[name=name]');

    if(!(/(^\d{15}$)|(^\d{17}([0-9]|X)$)/.test(keyword.val()))){
        alert('请输入正确的身份证号码！');
        return false;
    }else if(name.val() == ''){
        alert("请输入用户名！");
        return false;
    };
	window.open("/search/detail","_blank");
	return false;
});
</script>

<script type="text/javascript">
	// var idcard,
	// 	limit = 2,
	// 	finished,unfinished,record;

	// function reset(){
	// 	finished = unfinished = record = false;//重置查询状态
	// 	$('.datalist, .pagination').html('');
	// 	$('.nav-tabs li').eq(0).addClass('active').siblings().removeClass('active');
	// 	$('.tab-pane').eq(0).addClass('active in').siblings().removeClass('active in');
	// }
	// $(function(){
	// 	$('#search-submit').click(function(){
	// 		// 新开一个页面
	// 		window.open("/search/detail","_blank");

	// 		// var form = $('[name=search]');
	// 		// 	keyword = $('[name=keyword]');
			
	// 		// idcard = keyword.val();
	// 		// reset();
	// 		// $.ajax({
	// 		// 	url : '/search',
	// 		// 	type : 'post',
	// 		// 	dataType : 'json',
	// 		// 	data : {
	// 		// 		idcard : idcard,
	// 		// 		limit : limit
	// 		// 	},
	// 		// 	success : function(res){
	// 		// 		if(res['return']>0){
	// 		// 			$('#result').removeClass('hide');
	// 		// 			$('#idcard').text(idcard);
						
	// 		// 			$('#finished_count').text(res['data']['finished']['count']);
	// 		// 			$('#unfinished_count').text(res['data']['unfinished']['count']);
	// 		// 			$('#record_count').text(res['data']['record']['count']);
						
	// 		// 			var finished_list = $.template('loanlist_js', res['data']['finished']),
	// 		// 				finished_page = $.template('pagelist_js', res['data']['finished']);
	// 		// 			$('#finished .datalist').html(finished_list);
	// 		// 			$('#finished .pagination').html(finished_page);

	// 		// 			finished = true;
	// 		// 		}else{						
	// 		// 			$('#result').addClass('hide');
	// 		// 			alert(res['errmsg']);
	// 		// 		}
	// 		// 	}
	// 		// })
	// 		return false;
	// 	})
		
	// 	var type = 'finished';				
		
	// 	function loadList(opts){
	// 		var data = {
	// 			limit : limit,
	// 			idcard : idcard,
	// 			type : type == 'finished' ? 1 : (type == 'unfinished' ? 2 : 3)
	// 		};			
	// 		if(typeof opts == 'object')
	// 			$.extend(data, opts);
			
	// 		$.ajax({
	// 			url : '/search',
	// 			type : 'post',
	// 			dataType : 'json',
	// 			data : data,
	// 			success : function(res){
	// 				if(res['return'] > 0){
	// 					var html = $.template('loanlist_js', res['data']),
	// 						pagehtml = $.template('pagelist_js', res['data']);
	// 					$('#'+type).find('.datalist').html(html);
	// 					$('#'+type).find('.pagination').html(pagehtml);
	// 					if(type == 'finished')
	// 						finished = true;
	// 					else if(type == 'unfinished')
	// 						unfinished = true;
	// 					else if(type == 'record')
	// 						record = true;
	// 				}else{
	// 					$('#result').addClass('hide');
	// 					alert(res['errmsg']);
	// 				}
	// 			}
	// 		})
	// 	}	
		
	// 	$('.nav-tabs li').click(function(){
	// 		type = $(this).find('a').attr('href').replace('#','');
	// 		if(!eval(type))
	// 			loadList();
	// 	});
		
	// 	var p = page();		
	// 	p.click(function(n){
	// 		loadList({
	// 			p : n
	// 		})
	// 	})
	// })

</script>

<?php echo $this->partial('public/footer'); ?>
