				<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark"></h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>Add customer</span></li>
							  </ol>
							</div>
							<!-- /Breadcrumb -->
						</div>
						<!-- Row -->
					<div class="row">
						<form method="post" action="<?php echo base_url('admin/register_customer'); ?>" enctype="multipart/form-data">
							<div class="col-sm-8">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">
										<h6 class="panel-title txt-dark"><center>Add Customer</center></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											
												<div class="row">												
													<div class="form-group col-md-2">
														<label class="control-label mb-10 text-left">Title</label>
														<select name="title" id="" class='form-control' name="title">
														<option value="Mr.">Mr.</option>
														<option value="Mrs.">Mrs.</option>
														<option value="Ms.">Ms.</option>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">First name</label>
														<input type="text" class="form-control" name="fname" required>
													</div>
													<div class="form-group col-md-3 col-sm-4">
														<label class="control-label mb-10 text-left">middle name</label>
														<input type="text" class="form-control" name="mname">
													</div>
													<div class="form-group col-md-3 col-sm-4">
														<label class="control-label mb-10 text-left">last name</label>
														<input type="text" class="form-control" name="lname">
													</div>													
												</div>

												<div class="row">
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">Sex</label>
														<select name="sex" class="form-control" required>
															<option value="">--Select gender--</option>
															<option value="m">MALE</option>
															<option value="f">FEMALE</option>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">Profession</label>
														<select name="profession" class="form-control js-example-basic-single" required>
															<option value="">--select profession--</option>
															<?php 
																$q=$this->db->select("*")->from('profession')->get()->result();
																foreach ($q as $row) 
																{
																	echo "<option value='".$row->PROFESSION_ID."'>".$row->PROFESSION_NAME."</option>";
																}
															?>
														</select>
													</div>													
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">Credit limit</label>
														<input type="number" class="form-control" name="credit_lim" oninput="number(this)" maxlength="7">
													</div>		
												</div>

											
												<div class="row">
													<div class="form-group col-md-9 col-sm-9">
														<label class="control-label mb-10 text-left">Address</label>
														<input type="text" class="form-control" name="address" required maxlength="250">
													</div>	
													<div class="form-group col-md-3">
														<label class="control-label mb-10 text-left">Nationality</label>
														<input type="text" class="form-control" name="nation" required>
													</div>												
												</div>

												<div class="row">
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Pan no.</label>
														<input type="number" oninput="number(this)" maxlength="12" class="form-control" name="pan">
													</div>	
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Aadhar</label>
														<input type="number" oninput="number(this)" maxlength="12" class="form-control" name="aadhar" required>
													</div>	
													<div class="form-group col-md-4 col-sm-12">
														<label class="control-label mb-10 text-left">GST no.</label>
														<input type="number" oninput="number(this)" maxlength="12" class="form-control" name="gst">
													</div>
												</div>								

												<div class="row">													
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Contact no.</label>
														<input type="number" maxlength="11" oninput="number(this)" class="form-control" name="cont">
													</div>	
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Alt contact no.</label>
														<input type="number" maxlength="11" oninput="number(this)" class="form-control" name="alt_cont">
													</div>	
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Email</label>
														<input type="email" class="form-control" name="email" required>
													</div>
												</div>	

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">City</label>
														<select name="city" class="form-control js-example-basic-single" required>
															<option value="">--select City--</option>
															<?php 
																$q=$this->db->select("*")->from('cities')->get()->result();
																foreach ($q as $row) 
																{
																	echo "<option value='".$row->CITY_ID."'>".$row->CITY_NAME."</option>";
																}
															?>
														</select>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Registration date</label>
														<input type="DATE" id="reg_date" class="form-control" name="reg_date" required>
													</div>											
												</div>												

												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Sponser details</h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Added by</label>
														<select name="added_by" class="form-control js-example-basic-single" required id="added_by">
															<option value="">--Added by--</option>
															<?php 
															$q=$this->db->select("*")->from('hrm')->where('HRM_TYPE_ID',1)->get()->result();
															foreach ($q as $row) 
															{
																$name=$row->HRM_TITLE." ".$row->HRM_FIRST_NAME." ".$row->HRM_MIDDLE_NAME." ".$row->HRM_LAST_NAME."(".$row->HRM_REG_NO.")";
																echo "<option value='".$row->HRM_ID."'>".$name."</option>";
															}
															?>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Add under</label>
														<select name="add_under" class="form-control js-example-basic-single" required id="add_under">
															<option value="">--Add under--</option>
															
														</select>
													</div>		
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Branch </label>
														<select name="branch" class="form-control js-example-basic-single" required>
															<option value="">--select Branch--</option>
															<?php 
															$q=$this->db->select("*")->from('branch')->get()->result();
															foreach ($q as $row) 
															{
																echo "<option value='".$row->BRANCH_ID."'>".$row->BRANCH_NAME."(".$row->BRANCH_REG_NO.")"."</option>";
															}
															?>
														</select>
													</div>	
												</div>	

												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Nominee details</h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">
													<div class="form-group col-md-2">
														<label class="control-label mb-10 text-left">Title</label>
														<select id="" class='form-control' name="nom_title">
														<option value="mr.">Mr.</option>
														<option value="mrs.">Mrs.</option>
														<option value="ms.">Ms.</option>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">First name</label>
														<input type="text" class="form-control" name="nom_fname">
													</div>
													<div class="form-group col-md-3 col-sm-4">
														<label class="control-label mb-10 text-left">middle name</label>
														<input type="text" class="form-control" name="nom_mname">
													</div>
													<div class="form-group col-md-3 col-sm-4">
														<label class="control-label mb-10 text-left">last name</label>
														<input type="text" class="form-control" name="nom_lname">
													</div>
												</div>		

												<div class="row">														
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Aadhar</label>
														<input type="number" class="form-control" name="nom_aadhar" oninput="number(this)" maxlength="12">
													</div>	
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Relation with customer</label>
														<input type="text" class="form-control" name="nom_relation">
													</div>
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Profession</label>
														<select class="form-control js-example-basic-single" name="nom_profession" required>
															<option value="">--select profession--</option>
															<?php 
																$q=$this->db->select("*")->from('profession')->get()->result();
																foreach ($q as $row) 
																{
																	echo "<option value='".$row->PROFESSION_ID."'>".$row->PROFESSION_NAME."</option>";
																}
															?>
														</select>
													</div>													
												</div>	

												<div class="row">
													<div class="form-group col-md-12 col-sm-6">
														<label class="control-label mb-10 text-left">Address</label>
														<input type="text" class="form-control" name="nom_address" id="nom" required>
													</div>	
												</div>	
										
												<div class="form-group mb-30">
													<input class="btn btn-primary btn-md" type="submit" name="submit">
												</div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="panel panel-default card-view">
								<div class="panel-wrapper collapse in">
									<div class="panel-title align-center">Plan Selecter</div>
									<div class="panel-body">
										<div class="form-wrap">												
											
												<div class="form-group">
													<label>Plan Type</label>
													<select class="form-control" name="ac_type" id="calc_plan_type" required>
														<option value="">--Select plan type--</option>
														<?php 															
															$q=$this->db->select("*")->from('plan_type')
															->where('PLAN_TYPE_ID !=',4)->get()->result();
															foreach ($q as $row) 
															{
																echo "<option value='".$row->PLAN_TYPE_ID."'>".$row->PLAN_NAME."</option>";


															}
														?>
													</select>
												</div>
												<div class="form-group">
													<label>Plan Name</label>
													<select class="form-control" name="plan_name" id="calc_plan_name" required>
														<option value="">--Select plan Name--</option>
													</select>
												</div>
												<div class="form-group">
													<label>Plan Amount</label>
													<select class="form-control" name="plan_amount" id="calc_plan_amount" required>
														<option value="">--Select Installment Amount --</option>
													</select>
												</div>
												<div class="form-group">
													<input type="hidden" class="form-control" name="plan_duration" id="calc_plan_duration">
												</div>
												<div class="form-group">
													<button type="button" class="btn btn-sm btn-primary form-control" id="calculate" style="float:right">Calculate</button>
												</div>		
												<div class="form-group">
													<label>Redemption Value</label>
													<input type="text" class="form-control" id="redemption_value" readonly>
												</div>
												<div class="form-group">
													<label>Loyelty Bonus</label>
													<input type="text" class="form-control" id="loyelty_bonus" readonly>
												</div>
												<div class="form-group">
													<label>Total Amount</label>
													<input type="text" class="form-control" id="total_amount" readonly>
												</div>										
																						
										</div>
									</div>
								</div>
							</div>
						</div>
						</form>
						
					</div>
					<!-- /Row -->
					</div>
				</div>
				<script type="text/javascript">

					$(document).ready( function() 
					{
					    var date=new Date;
					    var day = date.getDate();
						var month = date.getMonth() + 1;
						var year = date.getFullYear();

						if (month < 10) month = "0" + month;
						if (day < 10) day = "0" + day;

						var today = year + "-" + month + "-" + day;       
						document.getElementById("reg_date").value = today;

						$('.js-example-basic-single').select2();
					})

					//select plan type for customer
					$("#plan_type").on('change',function(){
						$.ajax({
							url:"<?php echo base_url('extra/check/get_plans'); ?>",
							type:"post",
							data:{data:this.value},
							dataType:"json",
							success:function(result)
							{
								$("#plan_name").html('<option value="">--Select plan--</option>');
								$("#plan_amount").html('<option value="">--Select plan amount--</option>');
								$("#plan_duration").html('<option value="">--Select plan duration--</option>');
								for(var x in result)
								{
									var name=result[x]['PLAN_NAME'];
									var id=result[x]['PLAN_ID'];
									$("#plan_name").append("<option value='"+id+"'>"+name+"</option>");
								}
							}
						});
					});
					//select plan name for customer
					$("#plan_name").on('change',function(){
						var type_id=$("#plan_type").val();
						$.ajax({
							url:"<?php echo base_url('extra/check/get_amount'); ?>",
							type:"post",
							data:{data:this.value,type:type_id},
							dataType:"json",
							success:function(result)
							{
								$("#plan_amount").html('<option value="">--Select plan amount--</option>');
								$("#plan_duration").html('<option value="">--Select plan duration--</option>');
								for(var x in result)
								{
									var name=result[x]['PLAN_EMI_AMOUNT'];
									//var id=result[x]['PLAN_ID'];
									$("#plan_amount").append("<option value='"+name+"'>"+name+"</option>");
								}
							}
						});
					});

					//select plan amount for customer
					$("#plan_amount").on('change',function(){
						var type_id=$("#plan_name").val();
						
						$.ajax({
							url:"<?php echo base_url('extra/check/get_duration'); ?>",
							type:"post",
							data:{data:this.value,id:type_id},
							dataType:"json",
							success:function(result)
							{
								$("#plan_duration").html('<option value="">--Select plan duration--</option>');
								for(var x in result)
								{
									var name=result[x]['PLAN_EMI_PERIOD'];
									//var id=result[x]['PLAN_ID'];
									$("#plan_duration").append("<option value='"+name+"'>"+name+"</option>");
								}
							}
						});
					});

					//select added by for customer
					$("#added_by").on('change',function(){						
						$.ajax({
							url:"<?php echo base_url('extra/check/get_under'); ?>",
							type:"post",
							data:{data:this.value},
							dataType:"json",
							success:function(result)
							{
								$("#add_under").html('<option value="">--Add under--</option>');
								for(var x in result)
								{
									var name=result[x]['HRM_TITLE']+" "+result[x]['HRM_FIRST_NAME']+" "+result[x]['HRM_MIDDLE_NAME']+" "+result[x]['HRM_LAST_NAME']+"("+result[x]['HRM_REG_NO']+")";
									$("#add_under").append("<option value='"+result[x]['HRM_ID']+"'>"+name+"</option>");
								}
							}
						});
					});
					
					//Select Plan Type For Calculation
					$('#calc_plan_type').on('change',function(){
						$.ajax({
							url:"<?php echo base_url('extra/check/get_plans') ?>",
							type:"post",
							data:{data:$('#calc_plan_type').val()},
							dataType:"json",
							success:function(result)
							{
								$('#calc_plan_name').html('<option value="">--Select plan Name--</option>');
								$('#calc_plan_amount').html('<option value="">--Select Installment Amount --</option>');
								$('#calc_plan_duration').html('<option value="">--Select Plan Duration--</option>');
								for(var i in result)
								{
									$('#calc_plan_name').append('<option value="'+result[i]['PLAN_ID']+'">'+result[i]['PLAN_NAME']+'</option>');
								}
							},
							error:function()
							{
								alert('Error');
							}
						});
					})

					//Select plan Name For Calculation
					$('#calc_plan_name').on('change',function(){
						$.ajax({
							url:"<?php echo base_url('extra/check/get_amount') ?>",
							type:"post",
							data:{data:$('#calc_plan_name').val()},
							dataType:"json",
							success:function(result)
							{								
								$('#calc_plan_amount').html('<option value="">--Select Installment Amount --</option>');
								$('#calc_plan_duration').html('<option value="">--Select Plan Duration--</option>');
								for(var i in result)
								{
									$('#calc_plan_amount').append('<option value="'+result[i]['PLAN_EMI_AMOUNT']+'">'+result[i]['PLAN_EMI_AMOUNT']+'</option>');
								}
							},
							error:function()
							{
								alert('Error');
							}
						});
					})

					//Select plan Period For Calculation
					$('#calc_plan_amount').on('change',function(){
						$.ajax({
							url:"<?php echo base_url('extra/check/get_duration') ?>",
							type:"post",
							data:{data:$('#calc_plan_amount').val(),id:$('#calc_plan_name').val()},
							dataType:"json",
							success:function(result)
							{								
								$('#calc_plan_duration').html('<option value="">--Select Plan Duration--</option>');
								for(var i in result)
								{
									// $('#calc_plan_duration').append('<option value="'+result[i]['PLAN_EMI_PERIOD']+'">'+result[i]['PLAN_EMI_PERIOD']+'</option>');
									$('#calc_plan_duration').val(result[i]['PLAN_EMI_PERIOD']);
								}
							},
							error:function()
							{
								alert('Error');
							}
						});
					})

					//Calculate 
					$('#calculate').on('click',function(){
						if($('#calc_plan_amount').val()=="" || $('#calc_plan_name').val()=="" || $('#calc_plan_type').val()=="")
						{
							alert('Fill all Fiels To Calculate')
						}
						else
						{
							$.ajax({
								url:"<?php echo base_url('extra/check/calculate') ?>",
								type:"post",
								data:{plan_id:$('#calc_plan_name').val(),amount:$('#calc_plan_amount').val(),duration:$('#calc_plan_duration').val(),plan_type:$('#calc_plan_type').val()},
								dataType:"json",
								success:function(result)
								{
									$('#redemption_value').val(result[0]);
									$('#loyelty_bonus').val(result[1]);								
									$('#total_amount').val(result[2]);
								},
								error:function()
								{
									alert('Error');
								}
							})
						}
					})

					function number(x)
					{
						if (x.value.length > x.maxLength) x.value = x.value.slice(0, x.maxLength);
					}
				</script>