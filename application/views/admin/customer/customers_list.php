<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('commission_divide/comission_pay'); ?>" method="post">       	
        	<div class="row">
        		<div class="col-md-4">
					<div class="form-group">
						<input type="hidden" name="hrm_id" id="hrm_id1" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="hidden" name="plan_act_id" id="plan_id1" class="form-control">
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="hidden" name="receipt_no" id="receipt_no" class="form-control">
					</div>
				</div>
        	</div>
        	<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Name</label>
						<input type="text" name="name" readonly class="form-control" id="name">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="message-text" class="control-label mb-10">wallet</label>
						<input type="text" name="amount" readonly class="form-control" id="amount" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="recipient-name" class="control-label mb-10">Mode of payment</label>
						<select class="form-control" name="type" required>
							<option value="1" selected>Cash</option>
							<option value="2">Cheque</option>
							<option value="3">Demand draft</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="message-text" class="control-label mb-10">Date</label>
						<input type="date" id="date" class="form-control" name="date">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<input type="submit" name="sub" class="btn btn-info btn-md">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
        </form>
      </div>
    </div>
     

  </div>
</div>

<!-- Main Content -->
<div id="main_content">
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="row">
								<div class="col-md-6">
									<h6 class="panel-title txt-dark">Subscriber List</h6>
								</div>
								<div class="col-md-6 text-right">
									<a href="<?php echo base_url(); ?>admin/customer/add_customer" class="btn btn-success">Add Subscriber</a>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<hr class="light-grey-hr"/>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="tbl" class="table table-hover display pb-30" >
											<thead>
												<tr>
													<th>Registration No</th>
													<th>Name</th>
													<th>Wallet amount</th>
													<th>address</th>
													<th>pay</th>		
													<th>Tools</th>											
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
</div>
		<script type="text/javascript">
			
				var table=$('#tbl').dataTable(
				{
				"ajax":{"url":admin_loc+"cust_list"},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"name"},
							{"data":"sum"},
							{"data":"HRM_ADDRESS"},
							{"data":"HRM_ID",render:function(data,type,row)
								{	
									return '<button type="button" onclick="pay('+data+')" class="btn btn-primary btn-sm">Pay</button>';
									
								}
							},
							{"data":"HRM_ID",render:function(data,type,row)
								{	
									return '<a href="<?php echo base_url(); ?>admin/customer/view/'+data+'" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;<a href="<?php echo base_url(); ?>admin/customer/edit/'+data+'" ><i class="fa fa-edit"></i></a>';
									
								}
							}
							
							
							
							
						]
					});
			function pay(data)
			{
				$.ajax({
					url:admin_loc+"customer_details_model_pay",
					type:"post",
					data:{reg:data},
					dataType:"json",
					success:function(result)
					{
						if(result['sum'] != 0)
						{
							var name=result['HRM_TITLE']+" "+result['HRM_FIRST_NAME']+" "+result['HRM_MIDDLE_NAME']+" "+result['HRM_LAST_NAME'];
							$("#name").val(name);
							$("#amount").val(result['sum']);	
							$("#hrm_id1").val(result['HRM_ID']);
							$("#plan_id1").val(result['PLAN_ACTIVATION_ID']);
							$("#receipt_no").val(result['RECEIPT_NO']);		
							$("#myModal").modal();
						}
						else
						{
							alert("Already paid");
						}
						
					},
					error:function(result)
					{

						alert(result);
					}
				});
			}

		</script>