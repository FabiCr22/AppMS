$(document).ready(function(){
	
	$('.item .delete').click(function(){
		
		var elem = $(this).closest('.item');
		$.confirm({
			'title'		: 'Confirmar Eliminación',
			'message'	: '¿Estás seguro de eliminar este registro?',
			'buttons'	: {
				'Aceptar'	: {
					'class'	: 'blue',
					'action': function(){
						elem.slideUp();
					}
				},
				'Cancelas'	: {
					'class'	: 'gray',
					'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
				}
			}
		});
		
	});
	
});