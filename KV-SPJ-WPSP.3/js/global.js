function GetModal(sHref) {
	$('#modals').removeData('bs.modal');
	// $('#modals').modal({
	// 	remote: sHref,
	// 	show: true
	// });
	console.log($('#modals').modal());
}