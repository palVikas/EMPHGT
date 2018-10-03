<script>
$(document).ready(function() {
	$('.payment_agent').click(function () {
		var hrm_id=$(this).attr('attr-id-agent');
		var rem_amount=$(this).attr('total_rem_amt');
		var name=$(this).attr('attr-agent-name');
		$('#hrm_id1').val(hrm_id);
		$('#name').val(name);
		$('#amount').val(rem_amount*(-1));
		$('#payment_agent_modal').modal('show');
	});
	$("#pay_agent").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: admin_loc+'pay_agent',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.pay_agent').attr("disabled","disabled");
                
            },
            success: function(msg){
             
                if(msg != 'err'){
					$('.error').show();
					$('.error').focus();
					$('.error .alert-success').html('Payment Successfull!');
					$('.error .alert-success').delay(5000).fadeOut();
					var hrm_id=$('#hrm_id1').val();
					$('.tot_amt'+hrm_id).html('0');
					$('.btn_pay'+hrm_id).attr('disabled',true);
					$('.btn_pay'+hrm_id).html('No Amount To Pay');
					
                }else{
					 $('.error').show();
					 $('.error .alert-success').html('Something wents wrong!');
					 $('.error .alert-success').focus();
					 $('.error .alert-success').addClass('alert-danger');
					 $('.error .alert-success').removeClass('alert-success');
					 $('.error .alert-danger').delay(5000).fadeOut();
					 $(".pay_agent").removeAttr("disabled");
                }
				
                
            }
        });
    });
});
</script>

<div id="payment_agent_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
	<!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Payment</h4>
      </div>
      <div class="modal-body">
          	<form id="pay_agent">
        	<div class="row">
				<div class="col-md-12 error">
					<div class=" alert alert-success">  
						Hello
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<input type="hidden" name="hrm_id" id="hrm_id1" class="form-control">
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
					<input type="submit" name="payagent" class="btn btn-info btn-md pay_agent">
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
							
							<div class="row">
								<div class="col-md-6">
									<h6 class="panel-title txt-dark">Advisor List</h6>
								</div>
								<div class="col-md-6 text-right">
									<a href="<?php echo base_url(); ?>admin/advisor/add_advisor" class="btn btn-success">Add Advisor</a>
								</div>
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
													<th>Rank</th>
													<th>Name</th>													
													<th>Customers</th>
													<th>Commission Amount</th>	
													<th>Contact</th>
													<th>Pay</th>
													<th>Tools</th>																
												</tr>
											</thead>
											<tbody>	
												<?php if(!empty($get_list_advisor)) { foreach($get_list_advisor as $list_advisor) { 
														
															
															$hrm_id=$list_advisor->HRM_ID;
															$total_calc=0;
															$count_cust=0;
															$count = $this->db->query("select * from hrm_relation where HRM_ADDED_BY=$hrm_id");
															$all_hrm_rel= $count->result();
															foreach($all_hrm_rel as $relation_cust){
																$HRM_ID=$relation_cust->NEW_HRM_ID;
																$hrm_type = $this->db->query("select * from hrm where HRM_ID=$HRM_ID");
																$hrm_type=$hrm_type->result();
																//print_r($hrm_type);
																if($hrm_type[0]->HRM_TYPE_ID==4){
																	$count_cust++;
																}
															
															}
															
															$wallet = $this->db->query("select * from wallet_balance where HRM_ID=$hrm_id");
															$wallet=$wallet->result();
														
															foreach($wallet as $amount){
																$total_calc+=$amount->WALLET_AMOUNT;
															}
															
															$full_ldger_dt=get_ledger_name("advisor_".$hrm_id);
															$ldger_amount_for_advisor=$full_ldger_dt[0]->AMOUNT;
															$total_calc=$total_calc-$ldger_amount_for_advisor;
												
												?>
													<tr>
														<td><?php echo $list_advisor->HRM_REG_NO; ?></td>
														<td><?php echo $list_advisor->RANK_NAME; ?></td>
														<td><?php echo $full_nm=$list_advisor->HRM_FIRST_NAME." ".$list_advisor->HRM_MIDDLE_NAME." ".$list_advisor->HRM_LAST_NAME; ?></td>
														<td><?php echo $count_cust; ?></td>
														<td class="tot_amt<?php echo $hrm_id; ?>"><?php if($total_calc!=0) { echo $total_calc; } else { echo "0"; } ?></td>
														<td><?php echo $list_advisor->HRM_CONTACT; ?></td>
														<td>
															<?php if($total_calc!=0) { ?>
															<button type="button" class="btn_pay<?php echo $hrm_id; ?> btn btn-primary payment_agent" attr-agent-name="<?php echo $full_nm; ?>" attr-id-agent="<?php echo $hrm_id; ?>" total_rem_amt="<?php echo $total_calc; ?>">Pay Comission</button>
															<?php } else { ?>
															<button type="button" class="btn_pay<?php echo $hrm_id; ?> btn btn-primary payment_agent" attr-agent-name="<?php echo $full_nm; ?>" attr-id-agent="<?php echo $hrm_id; ?>" total_rem_amt="<?php echo $total_calc; ?>" disabled>No Amount To Pay</button>
															<?php } ?>
														</td>
														<td><a href="<?php echo base_url(); ?>admin/advisor/view/<?php echo $list_advisor->HRM_ID; ?>" ><i class="fa fa-eye"></i></a>&nbsp;&nbsp;
															<a href="<?php echo base_url(); ?>admin/advisor/edit/<?php echo $list_advisor->HRM_ID; ?>" ><i class="fa fa-edit"></i></a>
														</td>
													</tr>
												<?php } } ?>
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
