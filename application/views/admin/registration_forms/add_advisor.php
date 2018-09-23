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
										<h6 class="panel-title txt-dark"><center>Add Advisor</center></h6>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form method="post" action="<?php echo base_url('admin/register_advisor'); ?>">
												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Type</label>
														<select name="hrm_type" class="form-control" required id="hrm_type">
															<option value="">--Select Type--</option>
															<?php
															
															$query=$this->db->select("*")->from('hrm_type')
																						->where('HRM_TYPE_ID',1)
																						->or_where('HRM_TYPE_ID',2)	
															                             ->get()->result();
															foreach ($query as $row) 
															{
																echo "<option value='".$row->HRM_TYPE_ID."'>".$row->HRM_TYPE_POST."</option>";
															}

															?>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
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
																								
												<!--<div class="row" id="adv">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">rank</label>
														<select name="rank" class="form-control" id="rnk">
																			
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">under</label>
														<select name="under" class="form-control" id="und">
																	
														</select>
													</div>-->


											

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

					$('#hrm_type').change(function(){
						$.ajax({
							url:"<?php echo base_url('extra/check/get_type'); ?>",
							type:"post",
							data:{data:$('#hrm_type').val()},
							dataType:"json",
							success:function(result)
							{
								//$('#rnk').html();
								$('#und').html();
								var to_append="";
								if($('#hrm_type').val() == 1)
								{
																		
									for(var x in result[0])
									{	
																			
										to_append+="<option value='"+result[0][x]['RANK_ID']+"'>"+result[0][x]['RANK_DESCRIPTION']+"</option>";

                                       
										//$('#rnk').append("<option value='"+result[0][x]['RANK_ID']+"'>"+result[0][x]['RANK_DESCRIPTION']+"</option>");
									}
									 $('#rnk').html(to_append);
									for(var x in result[1])
									{	

										$('#und').append("<option value='"+result[1][x]['HRM_ID']+"'>"+result[1][x]['HRM_FIRST_NAME']+"</option>");
									}
								}

								else if($('#hrm_type').val() == 2)
								{
									
									for(var x in result)
									{

										to_append+="<option value='"+result[x]['RANK_ID']+"'>"+result[x]['RANK_DESCRIPTION']+"</option>";
										///$('#rnk').append("<option value='"+result[x]['RANK_ID']+"'>"+result[x]['RANK_DESCRIPTION']+"</option>");
									}
									$("#rnk").html(to_append);
								}
								
							},
							error:function()
							{
								alert("error");
							}
						});
					});

					$("#hrm_type").on('change',function(){
						var hrm_val = $("#hrm_type").val();
						if (hrm_val==1)
						{
							$.ajax({
								url:"<?php echo base_url('extra/check/get_super'); ?>",
								data:"",
								type:"post",
								dataType:"json",
								success:function(result)
								{
									for(var x in result)
									{
										var name=result[x]['HRM_TITLE']+" "+result[x]['HRM_FIRST_NAME']+" "+result[x]['HRM_MIDDLE_NAME']+" "+result[x]['HRM_LAST_NAME'];
										$("#add_under").append("<option value='"+result[x]['']+"'>"+name+"</option>")
									}
								}

							});
						}
					})

				
					function number(x)
					{
						if (x.value.length > x.maxLength) x.value = x.value.slice(0, x.maxLength);
					}
				</script>