<?php
	$bname=$branch_details[0]->BRANCH_NAME;
	$cname=$branch_details[0]->COMPANY_ID;
	$address=$branch_details[0]->BRANCH_ADDRESS;
	$reg=$branch_details[0]->BRANCH_REG_DATE;
	$contact=$branch_details[0]->BRANCH_CONTACT;
	$city_id=$branch_details[0]->BRANCH_CITY;
	$phone=$branch_details[0]->BRANCH_PHONE;
	$reg_no=$branch_details[0]->BRANCH_REG_NO;
	$comp=$this->db->query('select COMPANY_NAME from company where COMPANY_ID="'.$cname.'"')->result();
	$comp=$comp[0]->COMPANY_NAME;
	$city=$this->db->query('Select CITY_NAME from cities where CITY_ID="'.$city_id.'"')->result();
	$city=$city[0]->CITY_NAME;


?>	
		<div class="page-wrapper">
					<div class="container-fluid">
						
						<!-- Title -->
						<div class="row heading-bg">
							<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
							  <h5 class="txt-dark">Branch</h5>
							</div>
							<!-- Breadcrumb -->
							<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
							  <ol class="breadcrumb">
								<li><a href="index-2.html">Admin</a></li>
								<li><a href="#"><span>Dashboard</span></a></li>
								<li class="active"><span>view Branch</span></li>
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
										<h6 class="panel-title txt-dark"><center>View Branch details</center></h6>
									</div>									
									<div class="clearfix"></div>
								</div>
								<div class="error alert alert-success">hello</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Branch Name</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $bname; ?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Company name</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $comp; ?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Registration No</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $reg_no?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Registration Date</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $reg?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Address</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $address?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">City</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $city?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Contact No</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $contact?>">
									</div>
									<div class="form-group col-md-6">
										<label class="control-label mb-10 text-left">Phone No</label>
										<input type="text" class="form-control" readonly="readonly" value="<?php echo $phone?>">
									</div>									
								</div>
							</div>
						</div>
					</div>
					<!-- /Row -->
					</div>
				</div>
			
				<script>
					function number(x)
					{
						if (x.value.length > x.maxLength) x.value = x.value.slice(0, x.maxLength);
					}
				</script>