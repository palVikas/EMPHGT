<?php
 	// print_r($advisor_details);
 	$name=$advisor_details[0]->HRM_TITLE." ".$advisor_details[0]->HRM_FIRST_NAME." ".$advisor_details[0]->HRM_MIDDLE_NAME." ".$advisor_details[0]->HRM_LAST_NAME;
 	$branch=$this->db->query('select BRANCH_NAME from branch where BRANCH_ID="'.$advisor_details[0]->BRANCH_ID.'"')->result();
 	$branch=$branch[0]->BRANCH_NAME;
 	$profession=$this->db->query('select * from profession where PROFESSION_ID="'.$advisor_details[0]->HRM_PROFESSION_ID.'"')->result();
 	$profession=$profession[0]->PROFESSION_NAME;
 	$rank=$this->db->query('select * from rank where RANK_ID="'.$advisor_details[0]->RANK_ID.'"')->result();
 	$rank=$rank[0]->RANK_NAME;
 	$city=$this->db->query('Select CITY_NAME from cities where CITY_ID="'.$advisor_details[0]->HRM_CITY.'"')->result();
 	$city=$city[0]->CITY_NAME;
?>
<!DOCTYPE html>
	<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark">Advisor Details</h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>Advisor Details</span></li>
							  </ol>
							</div>
							<!-- /Breadcrumb -->
						</div>
						<!-- Row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="panel panel-default card-view">
								<div class="panel-heading">
									<div class="pull-left">

									</div>									
									<div class="clearfix"></div>
								</div>
								<div class="error alert alert-success">hello</div>
								<div class="row">
									<div class="form-group col-md-12">
										<label class="control-label mb-10 text-left">Name</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $name ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Rank</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $rank ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Registration No</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_REG_NO; ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Registration Date</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_REG_DATE; ?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Profession</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $profession; ?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Credit Limit</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_CREDIT_LIMIT; ?>">
									</div>
									<div class="form-group col-md-8">
										<label class="control-label mb-10 text-left">Address</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_ADDRESS; ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">City</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $city; ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Contact</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_CONTACT; ?>">
									</div>

									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Alt Contact</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_ALT_CONTACT; ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Email</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_EMAIL; ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Pan No</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_PAN; ?>">
									</div>

									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">Aadhar No</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_ADHAAR; ?>">
									</div>
									<div class="form-group col-md-4">
										<label class="control-label mb-10 text-left">GST No</label>
										<input type="text" class="form-control rounded-input" readonly="readonly" value="<?php echo $advisor_details[0]->HRM_GST; ?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Branch</label>
										<input type="text" class="form-control rounded-input rounded-input" readonly="readonly" value="<?php echo $branch; ?>">
									</div>
																	
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					</div>
				</div>