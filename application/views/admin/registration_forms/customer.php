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
						<div class="col-sm-9">
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
											<form method="post" action="<?php echo base_url('admin/register_customer'); ?>" enctype="multipart/form-data">
												<div class="row">												
													<div class="form-group col-md-2">
														<label class="control-label mb-10 text-left">Title</label>
														<select name="title" id="" class='form-control' name="title">
														<option value="mr.">Mr.</option>
														<option value="mrs.">Mrs.</option>
														<option value="ms.">Ms.</option>
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
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Sex</label>
														<select name="sex" class="form-control" required>
															<option value="">--Select gender--</option>
															<option value="m">MALE</option>
															<option value="f">FEMALE</option>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Profession</label>
														<select name="profession" class="form-control" required>
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
														<select name="city" class="form-control" required>
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
														<input type="DATE" class="form-control" name="reg_date" required>
													</div>											
													
												<!--<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Upload photo</label>
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
															<span class="input-group-addon fileupload btn btn-info btn-anim btn-file"><i class="fa fa-upload"></i> <span class="fileinput-new btn-text">Select file</span> <span class="fileinput-exists btn-text">Change</span>
															<input type="file" name="image" required="">
															</span> <a href="#" class="input-group-addon btn btn-danger btn-anim fileinput-exists" data-dismiss="fileinput"><i class="fa fa-trash"></i><span class="btn-text"> Remove</span></a> 
														</div>
													</div>-->
												</div>

												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Plan details</h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Plan Type</label>
														<select name="ac_type" class="form-control" id="plan_type" required>
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
														<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Credit limit</label>
														<input type="number" class="form-control" name="credit_lim" oninput="number(this)" maxlength="7">
													</div>	
												</div>

											

												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Plan name</label>
														<select name="plan_name" class="form-control" id="plan_name" required>
															<option value="">--Select plan--</option>
														</select>
														
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Amount</label>
														<select name="plan_amount" class="form-control" id="plan_amount" required>
															<option value="">--Select plan amount--</option>
														
														</select>
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Duration(In month)</label>
														<select name="plan_duration" class="form-control" id="plan_duration" required>
															<option value="">--Select plan duration--</option>
														
														</select>
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
														<select name="added_by" class="form-control" required id="added_by">
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
														<select name="add_under" class="form-control" required id="add_under">
															<option value="">--Add under--</option>
															
														</select>
													</div>		
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Branch </label>
														<select name="branch" class="form-control" required>
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
														<select class="form-control" name="nom_profession" required>
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
														<input type="text" class="form-control" name="nom_address" required>
													</div>	
												</div>	
										
												<div class="form-group mb-30">
													<input class="btn btn-primary btn-md" type="submit" name="submit">
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					</div>
				</div>
				<script type="text/javascript">
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
				
					function number(x)
					{
						if (x.value.length > x.maxLength) x.value = x.value.slice(0, x.maxLength);
					}
				</script>