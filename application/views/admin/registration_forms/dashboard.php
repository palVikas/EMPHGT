<?php  
	$customers=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',4)->get();
	$advisors=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',1)->get();
	$super=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',2)->get();



?>
<div class="page-wrapper">
	<div class="container-fluid">
		<br><br>


		<div class="row">
					<div class="form-group col-md-4 col-sm-6">
						<label class="control-label mb-10 text-left">PLANS</label>
						<select name="plan" id="plan" class="form-control">
							<option value="">ALL</option>
							<?php 
								$data=$this->db->select('*')->from('plan')->where('PLAN_ID !=',0)->get()->result();

								foreach ($data as $d) 
								{
									echo "<option value='".$d->PLAN_ID."'>".$d->PLAN_NAME."</option>";
								}


							?>	
						</select>										
					</div>
					<div class="form-group col-md-4 col-sm-6">
						<label class="control-label mb-10 text-left">AGENT</label>
						<select name="agent" id="agent" class="form-control">
							<option value="">ALL</option>
							<?php 
								$data=$this->db->select('*')->from('hrm')->where('HRM_TYPE_ID',1)->get()->result();

								foreach ($data as $d) 
								{
									echo "<option value='".$d->HRM_ID."'>".$d->HRM_FIRST_NAME."</option>";
								}


							?>	
						</select>										
					</div>	
					<div class="form-group col-md-4 col-sm-6">
						<label class="control-label mb-10 text-left">START DATE</label>
						<input type="date" name="start_date" id="start_date" class="form-control">
					</div>	
					<div class="form-group col-md-4 col-sm-6">
						<label class="control-label mb-10 text-left">END DATE</label>
						<input type="date" name="end_date" id="end_date" class="form-control">
					</div>	
				</div>

			<!-- Row -->
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-red">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $customers->num_rows(); ?></span></span>
													<span class="weight-500 uppercase-font txt-light block font-13">Customers</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-male-female txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-yellow">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $advisors->num_rows(); ?></span></span>
													<span class="weight-500 uppercase-font txt-light block">Advisors</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-redo txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
						<div class="panel panel-default card-view pa-0">
							<div class="panel-wrapper collapse in">
								<div class="panel-body pa-0">
									<div class="sm-data-box bg-green">
										<div class="container-fluid">
											<div class="row">
												<div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
													<span class="txt-light block counter"><span class="counter-anim"><?php echo $super->num_rows(); ?></span></span>
													<span class="weight-500 uppercase-font txt-light block">Super Advisors</span>
												</div>
												<div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
													<i class="zmdi zmdi-file txt-light data-right-rep-icon"></i>
												</div>
											</div>	
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>-->
				<!-- /Row -->
		


		<!-- Main Content -->
		
		
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default card-view">
						<div class="panel-heading">
							<div class="pull-left">
								<h6 class="panel-title txt-dark">Customers List</h6>
							</div>
							<div class="clearfix"></div>
						</div>
						<hr class="light-grey-hr"/>
						<div class="panel-wrapper collapse in">
							<div class="panel-body">
								<div class="table-wrap">
									<div class="table-responsive">
										<table id="tbl" class="table table-hover display pb-30" >
											<thead>
												<tr>
													<th>REG NO</th>
													<th>NAME</th>
													<th>ADDRESS</th>
													<th>PLAN NAME</th>
													<th>POLICY AMOUNT</th>
													<th>INSTALLMENTS</th>	
													<th>TOTAL</th>											
												</tr>
											</thead>
											<tbody>
											</tbody>
											<tfoot>
												<tr>
													<td>Amount</td>
													<td colspan="2">
														<span id="TotalAmount"></span>
													</td>
												</tr>
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


		<script type="text/javascript">
			var tbl={tbl:null};
			get_table({type:0,data:0});
			function get_table(data)
			{ 
				tbl.tbl =$('#tbl').dataTable(
				{
				"ajax":{
					"url":"<?php echo base_url('admin_dashboard/report'); ?>",
					"data":data,
					"type":"post"
					},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"HRM_FIRST_NAME"},
							{"data":"HRM_ADDRESS"},
							{"data":"PLAN_NAME"},
							{"data":"PLAN_EMI_AMOUNT"},
							{"data":"PLAN_EMI_PERIOD"},
							{"data":"PLAN_EMI_PERIOD"}
							
							
						],
							"footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;  
                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '')*1 : typeof i === 'number' ?  i : 0;
                    };

                    // total_salary over all pages
                    total_salary = api.column( 4 ).data().reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    },0 );

                    // total_page_salary over this page
                    total_page_salary = api.column( 4, { page: 'current'} ).data().reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                    total_page_salary = parseFloat(total_page_salary);
                    total_salary = parseFloat(total_salary);
                    // Update footer
                    $('#TotalAmount').html(total_page_salary.toFixed(2));               
                },
					});
				// console.log(tbl.tbl);
			}
				

				$(document).on('change', '#plan' ,function(){
					console.log(tbl.tbl);
					tbl.tbl.fnDestroy();
					var type=1;
					var data=$('#plan').val();
					get_table({type:type,data:data});
				});

				$(document).on('change', '#agent', function(){
					tbl.tbl.fnDestroy();
					var type=2;
					var data=$('#plan').val();
					var adv = $('#agent').val();
					get_table({type:type,data: data, adv:adv});
					console.log(tbl.tbl);
				});

				$(document).on('change','#start_date,#end_date',function(){
					// if(new Date($('#start_date').val()) !== "" && new Date($('#end_date').val()) !== ""){
					if(new Date($('#start_date').val()) <= new Date($('#end_date').val()))
					{
						tbl.tbl.fnDestroy();
						var type=3;
						var data=$('#plan').val();
						var adv = $('#agent').val();
						var start_date=$('#start_date').val();
						var end_date=$('#end_date').val();
						get_table({type: type, start_date: start_date, end_date: end_date, adv: adv, data: data});
					} else{
						alert("Please Select A valid date range");
					}
				// }
				});
		</script>		