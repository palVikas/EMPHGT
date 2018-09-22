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
        <form action="<?php echo base_url('extra/commission_divide/new_function'); ?>" method="post">
        	<input type="hidden" name="hrm_id" id="hrm_id">
        	<input type="hidden" name="plan_act_id" id="plan_id">
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
							<option value="">--Select payment type--</option>
							<option value="1">Cash</option>
							<option value="2">Check</option>
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
		<div class="page-wrapper">
					<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Subscriber List</h6>
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
													<th>Wallet amount</th>
													<th>address</th>
													<th>pay</th>													
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
		<div id="DIVI"></div>
		
	

		<script type="text/javascript">
			
				var table=$('#tbl').dataTable(
				{
				"ajax":{"url":"<?php echo base_url('admin/customers_list'); ?>"},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"HRM_FIRST_NAME"},
							{"data":"sum"},
							{"data":"HRM_ID"},
							{"data":"HRM_REG_NO",render:function(data,type,row)
								{	
									return '<button type="button" onclick="pay('+data+')" class="btn btn-info btn-sm">Pay</button>';
								}
							}
							
							
							
						]
					});
			function pay(data)
			{
				$.ajax({
					url:"<?php echo base_url('extra/get_details/customer_details'); ?>",
					type:"post",
					data:{reg:data},
					dataType:"json",
					success:function(result)
					{
						var name=result['HRM_TITLE']+" "+result['HRM_FIRST_NAME']+" "+result['HRM_MIDDLE_NAME']+" "+result['HRM_LAST_NAME'];
						$("#name").val(name);
						$("#amount").val(result['sum']);	
						$("#hrm_id").val(result['HRM_ID']);
						$("#plan_id").val(result['PLAN_ACTIVATION_ID']);		
						$("#myModal").modal();
					},
					error:function(result)
					{
						alert(result);
					}
				});
			}
		
		</script>