<!--CUSTOMER DETAIL MODAL-->
<div id="customer_detail_modal" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
		    <div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Customer Details</h4>
		    </div>
	    <div class="modal-body">
	        <form action="<?php echo base_url('extra/commission_divide/new_function'); ?>" method="post">
	        	<input type="hidden" name="hrm_id" id="hrm_id">
	        	<input type="hidden" name="plan_act_id" id="plan_id">
	        	
	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>REGISTRATION NO : <span id="cust_reg_no"></span></p>
						</div>
					</div>
	        	</div>
	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>NAME : <span id="cust_name"></span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>PROFESSION : <span id="cust_profession"></span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>ADDRESS : <span id="cust_address"></span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>CONTACT : <span id="cust_contact"></span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>EMAIL : <span id="cust_email"></span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>PAN : <span id="cust_pan"></span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>AADHAR : <span id="cust_aadhar"></span></p>
						</div>
					</div>
	        	</div>
	        	
	        	
	        	<hr class="light-gray-hr">
	        	

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>PLAN NAME : <span id="plan_name"></span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>AMOUNT : <span id="plan_amt"></span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>PERIOD : <span id="plan_duration"></span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>START DATE : <span id="plan_start_date"></span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>END DATE : <span id="plan_end_date">22-09-2020</span></p>
						</div>
					</div>
	        	</div>

	        	<hr class="light-gray-hr">
	        	

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>AGENT ID : <span id="agent_id">12345</span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>NAME : <span id="agent_name">PRIYANSHU RAWAT</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>PROFESSION : <span id="agent_profession">DOCTOR</span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>ADDRESS : <span id="agent_address">BARRA</span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>CONTACT : <span id="agent_contact">8090245678</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>EMAIL : <span id="agent_email">rp@gmail.com</span></p>
						</div>
					</div>
	        	</div>

	        	<div class="row">
	        		<div class="col-md-6">
						<div class="form-group">
							<p>PAN : <span id="agent_pan">554398764532</span></p>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<p>AADHAR : <span id="agent_aadhar">445678902349</span></p>
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
							{"data":"HRM_ADDRESS"},
							{"data":"HRM_REG_NO",render:function(data,type,row)
								{	
									//return '<button type="button" onclick="pay('+data+')" class="btn btn-info btn-sm">Pay</button>';
									return "<div class='dropdown'><button class='btn btn-sm btn-primary dropdown-toggle' type='button' data-toggle='dropdown'>options<span class='caret'></span></button> <ul class='dropdown-menu'>"+
									     '<li><a href="javascript:pay('+data+')">pay</a></li>'+
									      '<li><a href="<?php echo base_url('admin/view_customer_details/'); ?>'+data+'" target="blank">details</a></li>'+
									    '</ul></div>'
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

			function view_details(data)
			{
				window.location='<?php echo base_url('admin/view_customer_details/') ;?>'+data;
				//$('#customer_detail_modal').modal();
			}
		
		</script>