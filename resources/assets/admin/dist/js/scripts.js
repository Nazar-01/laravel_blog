$(document).ready( function (argument) {
	$('#example1').DataTable();
	
	$('.select2').select2();

	$('#datapicker').datepicker({
		autoclose: true
	});

	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});
});