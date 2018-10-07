<?php //print_r($unique_advisor) ?>		
		<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark">Advisor</h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>Add Advisor</span></li>
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
										<h6 class="panel-title txt-dark"><center>Edit Advisor details</center></h6>
									</div>									
									<div class="clearfix"></div>
								</div>
								<div class="error alert alert-success">hello</div>
								<div class="panel-wrapper collapse in">
									<div class="panel-body">
										<div class="form-wrap">
											<form id="update_advisor">
												<div class="form-body">
													<br><br>
													<h6 class="txt-dark capitalize-font">Personal details</h6>
													<hr class="light-gray-hr">
												</div>

												<div class="row">	
												<input type="hidden" name="hrm_id" value="<?php echo $unique_advisor[0]->HRM_ID?>">											
													<div class="form-group col-md-2">
														<label class="control-label mb-10 text-left">Title</label>
														<select name="title" class='form-control'>
														<option value="mr.">MR.</option>
														<option value="mrs.">MRS.</option>
														<option value="ms.">MS.</option>
														</select>
													</div>
													<div class="form-group col-md-4 col-sm-4">
														<label class="control-label mb-10 text-left">First name</label>
														<input type="text" class="form-control" value="<?php echo $unique_advisor[0]->HRM_FIRST_NAME ?>" required name="fname">
													</div>
													<div class="form-group col-md-3 col-sm-4">
														<label class="control-label mb-10 text-left">middle name</label>
														<input type="text" class="form-control" value="<?php echo $unique_advisor[0]->HRM_MIDDLE_NAME ?>" name="mname">
													</div>
													<div class="form-group col-md-3 col-sm-4">
														<label class="control-label mb-10 text-left">last name</label>
														<input type="text" class="form-control" value="<?php echo $unique_advisor[0]->HRM_LAST_NAME ?>" name="lname" required>
													</div>													
												</div>

												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Sex</label>
														<select class="form-control" name="sex" required>
															<option value="">--Select gender--</option>
															<option value="m" <?php if($unique_advisor[0]->HRM_SEX=="m"){echo " selected";} ?>>MALE</option>
															<option value="f" <?php if($unique_advisor[0]->HRM_SEX=="f"){echo " selected";} ?>>FEMALE</option>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Nationality</label>
														<input type="text" class="form-control" value="<?php echo $unique_advisor[0]->HRM_NATIONALITY ?>" name="nation">
													</div>
												</div>
												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Rank</label>
														<select name="rank" class="form-control" required id="rank">
															<option value="">--Select Rank--</option>
															<?php
																$data=$this->db->select('*')->from('rank')
																                      ->where('RANK_ID >',4)
																					  ->get()->result();

																foreach ($data as $row) { ?>
																		<option value='<?php echo $row->RANK_ID;?>' <?php if($row->RANK_ID == $unique_advisor[0]->RANK_ID){ echo " selected"; }?>>	<?php echo $row->RANK_NAME; ?></option>
															<?php }	?>
														</select>
													</div>
													<div class="form-group col-md-6">
														<label class="control-label mb-10 text-left">Profession</label>
														<select name="profession" class="form-control js-example-basic-single" required>
															<option value="">--Select profession--</option>
															<?php
																$query=$this->db->select("*")->from('Profession')->get()->result();

																foreach ($query as $row) { ?>
																		<option value='<?php echo $row->PROFESSION_ID;?>' <?php if($row->PROFESSION_ID == $unique_advisor[0]->HRM_PROFESSION_ID){ echo " selected"; }?>>	<?php echo $row->PROFESSION_NAME; ?></option>
															<?php }	?>
														</select>		
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
														<input type="text" class="form-control" value="<?php echo $unique_advisor[0]->HRM_ADDRESS ?>" name="address">		
													</div>
													
													<div class="form-group col-md-3 col-sm-6">
														<label class="control-label mb-10 text-left">city</label>
														<select name="city" class="form-control js-example-basic-single" required >
															<option value="">--Select City--</option>
														<?php
															$query=$this->db->select("*")->from('cities')->order_by('CITY_NAME')->get()->result();

														foreach ($query as $row) { ?>

															<option value='<?php echo $row->CITY_ID;?>' <?php if($row->CITY_ID == $unique_advisor[0]->HRM_CITY){ echo " selected"; }?>>	<?php echo $row->CITY_NAME; ?></option>
														
															
														<?php } ?>
														</select>
													</div>
												</div>
												
												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Contact</label>
														<input type="number" class="form-control" name="cont" value="<?php echo $unique_advisor[0]->HRM_CONTACT ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Alt. contact</label>
														<input type="number" class="form-control" name="alt_cont" value="<?php echo $unique_advisor[0]->HRM_ALT_CONTACT ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Email</label>
														<input type="email" class="form-control" value="<?php echo $unique_advisor[0]->HRM_EMAIL ?>" name="email">		
													</div>
												</div>			

												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">PAN no.</label>
														<input type="number" class="form-control" value="<?php echo $unique_advisor[0]->HRM_PAN ?>" name="pan" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Aadhar</label>
														<input type="number" class="form-control" value="<?php echo $unique_advisor[0]->HRM_ADHAAR ?>" name="aadhar" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="12">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">GST</label>
														<input type="number" class="form-control" value="<?php echo $unique_advisor[0]->HRM_GST ?>" name="gst" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="15">		
													</div>
												</div>			
												
												<div class="form-group mb-30">
													<input class="btn btn-primary btn-md update_advisor" type="submit" name="submit" value="UPDATE">
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

				$(document).on("change","#sponser",function(){

					$.ajax({
						url:admin_loc+"get_below_ranks",
						type:"post",
						data:{data:$('#sponser').val()},
						dataType:"json",
						success:function(result)
						{
							$('#rank').html("<option value=''>--Select Rank--</option>");
							for(var i in result)
							{
								$("#rank").append("<option value='"+result[i]['RANK_ID']+"'>"+result[i]['RANK_NAME']+"</option>");
							}
							
							//alert(result);
						},
						error:function(result)
						{
							alert(result);
						}
					});
				});	

					function number(x)
					{
						if (x.value.length > x.maxLength) x.value = x.value.slice(0, x.maxLength);
					}
				</script>