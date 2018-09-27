
<!-- Main Content -->
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Advisor List</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<hr class="light-grey-hr"/>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="tbl" class="table table-hover display  pb-30" >
											<thead>
												<tr>
													<th>Registration No</th>
													<th>Name</th>
													<th>Contact</th>													
													<th>Address</th>
													<th>Rank</th>																	
												</tr>
											</thead>
											<tbody>
											</tbody>
											<tfoot>
											</tfoot>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			
				var table=$('#tbl').dataTable(
				{
				"ajax":{"url":"<?php echo base_url('extra/Get_list/get_all_advisor'); ?>"},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"name"},
							{"data":"HRM_CONTACT"},
							{"data":"HRM_ADDRESS"},
							{"data":"RANK_NAME"}						
						]
					});

			// function pay(data)
			// {
			// 	$.ajax({
			// 		url:"<?php// echo base_url('extra/get_details/customer_details'); ?>",
			// 		type:"post",
			// 		data:{reg:data},
			// 		dataType:"json",
			// 		success:function(result)
			// 		{
			// 			if(result['sum'] != 0)
			// 			{
			// 				var name=result['HRM_TITLE']+" "+result['HRM_FIRST_NAME']+" "+result['HRM_MIDDLE_NAME']+" "+result['HRM_LAST_NAME'];
			// 				$("#name").val(name);
			// 				$("#amount").val(result['sum']);	
			// 				$("#hrm_id1").val(result['HRM_ID']);
			// 				$("#plan_id1").val(result['PLAN_ACTIVATION_ID']);		
			// 				$("#myModal").modal();
			// 			}
			// 			else
			// 			{
			// 				alert("Already paid");
			// 			}
						
			// 		},
			// 		error:function(result)
			// 		{

			// 			alert(result);
			// 		}
			// 	});
			// }

			// function view_details(data)
			// {
			// 	window.location='<?php //echo base_url('admin/view_customer_details/') ;?>'+data;
			// 	//$('#customer_detail_modal').modal();
			// }
		
		</script>