$(document).ready(function() {
    $('.submitButton').click(function(e) {
      e.preventDefault();
      $form=$(this).parents('form');
      // console.log($form.attr('action'))

      validateForm($form);
    });
});


function validateForm($form, $function){
	var button = $form.find('button');
	button.addClass('disabled');
	$.ajax({
		url:$form.attr('action'),
		method:"POST",
		dataType:'JSON',
  	async: false,
		data:$form.serializeArray(),
		success:function(data){

		},
		error:function(data){

		}
	});
}
