/*DataTable Init*/

"use strict"; 

$(document).ready(function() {
	"use strict";
	
	$('#datable_1').DataTable();
    $('#datable_3').DataTable(); 	
	$('#datable_4').DataTable();
	$('#datable_5').DataTable();
	$('#datable_6').DataTable({
		"iDisplayLength": 3
	});
    $('#datable_2').DataTable({ "lengthChange": false});
} );
