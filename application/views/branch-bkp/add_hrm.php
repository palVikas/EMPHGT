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
								<li><a href="index-2.html">Staff</a></li>
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
											<form method="post" action="<?php echo base_url('branch/register_hrm'); ?>">
												<div class="row">
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Type</label>
														<select name="hrm_type" class="form-control">
															<?php
															
															$query=$this->db->select("*")->from('hrm_type')->get()->result();
															foreach ($query as $row) 
															{
																echo "<option value='".$row->HRM_TYPE_ID."'>".$row->HRM_TYPE_POST."</option>";
															}

															?>
														</select>
													</div>
													<div class="form-group col-md-6 col-sm-6">
														<label class="control-label mb-10 text-left">Rank</label>
														<select name="rank" class="form-control">
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

												<div class="row">												
													<div class="form-group col-md-2">
														<label class="control-label mb-10 text-left">Title</label>
														<select name="title" id="" class='form-control'>
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
													<div class="form-group col-md-9">
														<label class="control-label mb-10 text-left">Address</label>
														<input type="text" class="form-control" required name="address">		
													</div>
													
													<div class="form-group col-md-3 col-sm-6">
														<label class="control-label mb-10 text-left">city</label>
														<select name="city" class="form-control">
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
														<input type="number" class="form-control" required name="cont">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Alt. contact</label>
														<input type="number" class="form-control" name="alt_cont">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Email</label>
														<input type="email" class="form-control" name="email">		
													</div>
												</div>			

												<div class="row">
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">PAN no.</label>
														<input type="number" class="form-control" name="pan">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">Aadhar</label>
														<input type="number" class="form-control" name="aadhar">		
													</div>
													<div class="form-group col-md-4">
														<label class="control-label mb-10 text-left">GST</label>
														<input type="text" class="form-control" name="gst">		
													</div>
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