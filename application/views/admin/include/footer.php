
		<script type="text/javascript">
			
			
			$(document).ready(function()
			{
				var option='<?php echo $_SESSION['admin']; ?>';
				if (option=="dashboard") 
				{
					dashboard();
				}
				else if (option=="customer") 
				{
					add_customer();
				}
				else if (option=="branch") 
				{
					add_branch();
				}
				else if (option=="company") 
				{
					add_company();
				}
				else
				{
					alert(option);
				}
			});
			
			function dashboard()
			{
				$.ajax({
					url:"<?php echo base_url('admin/dashboard'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function add_company()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_company'); ?>",
					type:"post",

					success:function(result)
					{
						<?php $_SESSION['admin']='company'; ?>
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function add_branch()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_branch'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function add_customer()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_customer'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});
			}
			function plan_list()
			{
				$.ajax({
					url:"<?php echo base_url('admin/plan_list'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function advisor()
			{
				$.ajax({
					url:"<?php echo base_url('admin/add_advisor'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function plan_type()
			{
				$.ajax({
					url:"<?php echo base_url('admin/plan_type'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function profession()
			{
				$.ajax({
					url:"<?php echo base_url('admin/profession'); ?>",
					type:"post",
					success:function(result)
					{

					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function cust_list()
			{
				$.ajax({
					url:"<?php echo base_url('admin/cust_list'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function super_adviser()
			{
				$.ajax({
					url:"<?php echo base_url('admin/super_adviser'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}
			function relation()
			{
				$.ajax({
					url:"<?php echo base_url('admin/relation'); ?>",
					type:"post",
					success:function(result)
					{
						$("#main_content").html(result);
					},
					error:function()
					{
						alert("error");
					}
				});	
			}

			function logout()
			{
				window.location='<?php echo base_url("login"); ?>';
			}
		</script>
        


			
			
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('include/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js'); ?>"></script>		
		
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('include/dist/js/jquery.slimscroll.js'); ?>"></script>		
		
		<!-- Fancy Dropdown JS -->
		<script src="<?php echo base_url('include/dist/js/dropdown-bootstrap-extended.js'); ?>"></script>		
	
		<!-- Slimscroll JavaScript -->
		<script src="<?php echo base_url('include/dist/js/jquery.slimscroll.js'); ?>"></script>		
		
		<!-- Owl JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js'); ?>"></script>
		
		<!-- Switchery JavaScript -->
		<script src="<?php echo base_url('include/vendors/bower_components/switchery/dist/switchery.min.js'); ?>"></script>		
	
		<!-- Init JavaScript -->
		<script src="<?php echo base_url('include/dist/js/init.js'); ?>"></script>
		
	</body>
</html>