$(document).ready(function(){
	/*$("#CI_Admin").blur(function (){	//evento cuando input pierde el foco
		var CI_Admin= this.value;		//asignar variable cedula
		$.ajax({
			url: 'assets/custom/vcedula.php',
			data: {CI_Admin: CI_Admin},
			type: 'POST',
			dataType: 'json',
			success:  function (response){
				console.log("res: "+response);
				if (response.estado=='OK') {
					$("#CI_Admin").css("border","1px solid green");
					$("#prueba").html('');
				} else {
					$("#CI_Admin").css("border","1px solid red");
					$("#prueba").html('CI o RUC incorrecto');
				}
			},			
		});		
	});*/

	$("#CiRuc_User").blur(function (){	//evento cuando input pierde el foco
		var CiRuc_User= this.value;		//asignar variable cedula
		$.ajax({
			url: 'assets/custom/vcedula.php',
			data: {CiRuc_User: CiRuc_User},
			type: 'POST',
			dataType: 'json',
			success:  function (response){
				console.log("res: "+response);
				if (response.estado=='OK') {
					$("#CiRuc_User").css("border","1px solid green");
					$("#prueba").html('');
				} else {
					$("#CiRuc_User").css("border","1px solid red");
					$("#prueba").html('CI o RUC incorrecto');
				}
			},			
		});		
	});
});