				<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark">Staff</h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>Add hrm</span></li>
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
										<h6 class="panel-title txt-dark"><center>Add HRM</center></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form method="post" action="<?php echo base_url('admin/register_hrm'); ?>">
												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Type</label>
														<select name="hrm_type" class="form-control" required>
															<option value="">--Select Type--</option>
															<?php
															
															$query=$this->db->select("*")->from('hrm_type')
																						->where('HRM_TYPE_ID',4)	
															                             ->get()->result();
															foreach ($query as $row) 
															{
																echo "<option value='".$row->HRM_TYPE_ID."'>".$row->HRM_TYPE_POST."</option>";
															}

															?>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Level</label>
														<select name="rank" class="form-control">
															<option value="">--Select level--</option>
															<?php
															$query=$this->db->select("*")->from('rank')->get()->result();

															foreach ($query as $row) 
															{
																echo "<option value='".$row->RANK_ID."'>".$row->RANK_NAME."</option>";
															}

															?>
														</select>
													</div>													
												</div>

												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Personal details</h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">												
													<div class="form-group col-md-2">
														<label class="control-label mb-10 text-left">Title</label>
														<select name="title" class='form-control'>
														<option value="mr.">Mr.</option>
														<option value="mrs.">Mrs.</option>
														<option value="ms.">Ms.</option>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">First name</label>
														<input type="text" class="form-control" value="" required name="fname">
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
														<select class="form-control" name="sex">
															<option value="">--Select gender--</option>
															<option value="m">MALE</option>
															<option value="f">FEMALE</option>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Nationality</label>
														<input type="text" class="form-control" required name="nation">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Profession</label>
														<select name="profession" class="form-control">
															<option value="">--Select profession--</option>
															<?php
																$query=$this->db->select("*")->from('Profession')->get()->result();

																foreach ($query as $row) 
																{
																	echo "<option value='".$row->PROFESSION_ID."'>".$row->PROFESSION_NAME."</option>";
																}

															?>
														</select>		
													</div>
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Registration date</label>
														<input type="date" class="form-control" required name="reg_date">		
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Account Type</label>
														<select name="ac_type" class="form-control">
															<option value="">--Select Account type--</option>
														<?php
															$query=$this->db->select("*")->from('plan_type')->get()->result();

															foreach ($query as $row) 
															{
																echo "<option value='".$row->PLAN_TYPE_ID."'>".$row->PLAN_NAME."</option>";
															}

														?>
														</select>		
													</div>
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Credit Limit</label>
														<input type="number" class="form-control" required name="credit_lim" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="7">		
													</div>
												</div>

												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Contact details</h6>
													<hr class="light-gray-hr">
												</div>


												<div class="row">
													<div class="form-group col-md-9">
														<label class="control-label mb-10 text-left">Address</label>
														<input type="text" class="form-control" required name="address">		
													</div>
													
													<div class="form-group col-md-3 col-sm-6">
														<label class="control-label mb-10 text-left">city</label>
														<select name="city" class="form-control">
															<option value="">--Select City--</option>
														<?php
															$query=$this->db->select("*")->from('cities')->order_by('CITY_NAME')->get()->result();

															foreach ($query as $row) 
															{
																echo "<option value='".$row->CITY_ID."'>".$row->CITY_NAME."</option>";
															}

														?>
														</select>
													</div>
												</div>
												
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Contact</label>
														<input type="number" class="form-control" required name="cont" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Alt. contact</label>
														<input type="number" class="form-control" name="alt_cont" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Email</label>
														<input type="email" class="form-control" name="email">		
													</div>
												</div>			

												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">PAN no.</label>
														<input type="number" class="form-control" name="pan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Aadhar</label>
														<input type="number" class="form-control" name="aadhar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">GST</label>
														<input type="text" class="form-control" name="gst" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15">		
													</div>
												</div>						
											

											<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Plan details</h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Plan Type</label>
														<select name="plan_type" class="form-control" id="plan_type" required>
															<option value="">--Select plan type--</option>
														<?php 															
															$q=$this->db->select("*")->from('plan_type')->get()->result();
															foreach ($q as $row) 
															{
																echo "<option value='".$row->PLAN_TYPE_ID."'>".$row->PLAN_NAME."</option>";
															}
														?>
														</select>													
													</div>
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Plan name</label>
														<select name="plan_name" class="form-control" id="plan_name" required>
															<option value="">--Select plan--</option>

														</select>														
													</div>
												</div>

											

												<div class="row">													
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Amount</label>
														<select name="plan_amount" class="form-control" id="plan_amount" required>
															<option value="">--Select plan amount--</option>				
														</select>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Duration(In month)</label>
														<select name="plan_duration" class="form-control" id="plan_duration" required>
															<option value="">--Select plan duration--</option>					
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
														<select name="nom_title" class='form-control'>
														<option value="mr.">Mr.</option>
														<option value="mrs.">Mrs.</option>
														<option value="ms.">Ms.</option>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">First name</label>
														<input type="text" class="form-control" value="" required name="nom_fname">
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
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Profession</label>
														<select name="nom_profession" class="form-control">
															<option value="">--Select profession--</option>
															<?php
																$query=$this->db->select("*")->from('Profession')->get()->result();

																foreach ($query as $row) 
																{
																	echo "<option value='".$row->PROFESSION_ID."'>".$row->PROFESSION_NAME."</option>";
																}

															?>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Aadhar no.</label>
														<input type="nom_aadhar" class="form-control" name="nom_aadhar" required>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Address</label>
														<input type="text" name="nom_address" class="form-control" required>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Relation</label>
														<input type="password" class="form-control" name="nom_relation" required>
													</div>
												</div>


												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font"></h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Username</label>
														<input type="text" name="user" class="form-control" required>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Password</label>
														<input type="password" class="form-control" name="pass" required>
													</div>
												</div>

												<div class="row">
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Added by</label>
														<select name="added_by" class="form-control" id="added_by">
															<option value="">--Select advisor--</option>
															<?php 
															 	$query=$this->db->select('*')->from('hrm')
															 				    ->where('HRM_TYPE_ID',1)	
															 	               // ->join('hrm_type','hrm.HRM_TYPE_ID=hrm_type.HRM_TYPE_ID')
															 	               /// ->order_by('hrm_type.HRM_TYPE_ID')
															 	                ->get()->result();
															 	foreach ($query as $hrm) 
															 	{
															 		//$hrm=$this->db->select('*')->from('hrm')
															 		            //  ->where('HRM_ID',$q->NEW_HRM_ID)
															 		            //  ->get()->row();
															 		$name=$hrm->HRM_TITLE." ".$hrm->HRM_FIRST_NAME." ".$hrm->HRM_MIDDLE_NAME." ".$hrm->HRM_LAST_NAME;
															 	  echo "<option value='".$hrm->HRM_ID."'>".$name."</option>";
															 	}  

															?>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Add under</label>
														<select name="add_under" class="form-control" id="add_under">
															<option value="">--Add under--</option>								
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-6">
														<label class="control-label mb-10 text-left">Branch id</label>
														<select name="branch" class="form-control">
															<option value="">--Select Branch--</option>
														<?php
															$query=$this->db->select("*")->from('branch')->get()->result();

															foreach ($query as $row) 
															{
																echo "<option value='".$row->BRANCH_ID."'>".$row->BRANCH_NAME."</option>";
															}

														?>
														</select>
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

				<script>
					
		
					$('#plan_type').change(function(){
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
							},
							error:function()
							{
								alert("error");
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

					$('#added_by').on('change',function(){
						$.ajax({
							url:"<?php echo base_url('extra/check/check_under'); ?>",
							type:"post",
							data:{data:this.value},
							dataType:"json",
							success:function(result)
							{
								$("#add_under").html('<option value="'+$('#added_by').val()+'">Self</option>');
								for(var x in result)
								{
									$('#add_under').append("<option value='"+result[x]['HRM_ID']+"'>"+result[x]['HRM_TITLE']+" "+result[x]['HRM_FIRST_NAME']+"</option>");
								}
							},
							error:function(result)
							{
								alert("error");
							}
						});
					})
				
					function number(x)
					{
						if (x.value.length > x.maxLength) x.value = x.value.slice(0, x.maxLength);
					}
				</script>