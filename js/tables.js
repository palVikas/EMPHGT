
	  var table=$('#tbl').DataTable(
				{
				"ajax":{"url":"./admin/customers_list"},
				"columns":
						[
							{"data":"HRM_REG_NO"},
							{"data":"HRM_FIRST_NAME"},
							{"data":"HRM_ADDRESS"},
							{"data":"HRM_ADDRESS"},							
							{"data":"HRM_REG_NO"}
							
						]
					});
			
