$(function(){
//get the click of the create client primary
//
$('#modal-button').click(function(){
	$('#modal').modal('show')
	.find('#modalContent')
	.load($(this).attr('value'))
})

});