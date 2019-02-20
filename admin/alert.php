<script type="text/javascript" src="js/plugins/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="js/plugins/sweetalert.min.js"></script>
<script type="text/javascript">
$('#demoNotify').click(function(){
	$.notify({
		title: "Update Complete : ",
		message: "Something cool is just updated!",
		icon: 'fa fa-check' 
	},{
		type: "info"
	});
});
$('#demoSwal').click(function(){
	swal({
		title: "Delete The Selected Record ?",
		text: "You will not be able to recover this file if deleted!",
		type: "warning",
		showCancelButton: true,
		confirmButtonText: "Yes, delete it!",
		cancelButtonText: "No, cancel plx!",
		closeOnConfirm: false,
		closeOnCancel: false
	}, function(isConfirm) {
		if (isConfirm) {
			swal("Deleted!", "Your Selected file has been deleted.", "success");
		} else {
			swal("Cancelled", "Your Selected file is safe :)", "error");
		}
	});
});
</script>