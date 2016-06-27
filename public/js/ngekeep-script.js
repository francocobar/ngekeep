$('body').on('click',".submitButton",function(){
    // $(this).parents('form').submit();
    $form=$(this).parents('form');
		// console.log($form.attr('action'))

    validateForm($form);
});


function validateForm($form, $function){
	var button = $form.find('button');
	button.addClass('disabled');
	unmask();
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
