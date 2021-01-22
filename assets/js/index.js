$(document).ready(function(){
  $("#dtbl").DataTable({
    "pagingType": "full_numbers",
    "language": {
      "lengthMenu": "Mostrar _MENU_ registros",
      "zeroRecords": "No se encontraron resultados",
      "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
      "infoFiltered": "(filtrado de un total de _MAX_ registros)",
      "sSearch": "Buscar:",
      "oPaginate": {
        "sFirst": "Primero",
        "sLast":"Último",
        "sNext":"Siguiente",
        "sPrevious": "Anterior"
      },
      "sProcessing":"Procesando...",
    }
  });

  $(".btnModalUser").click(function(){
    var id=$(this).data('id');
    var ciruc=$(this).data('ciruc');
    var nombre=$(this).data('nombre');
    var telefono=$(this).data('telefono');
    var email=$(this).data('email');
    var direccion=$(this).data('direccion');
    var descripcion=$(this).data('descripcion');
    document.getElementById("cirucModal").innerHTML = ciruc ;
    document.getElementById("nombreModal").innerHTML = nombre ;
    document.getElementById("telefonoModal").innerHTML = telefono ;
    document.getElementById("emailModal").innerHTML = email ;
    document.getElementById("direccionModal").innerHTML = direccion ;
    document.getElementById("descripcionModal").innerHTML = descripcion ;
    $("#Id_User").val(id);
  });

  var idElimProd= -1;
  var filaProd;   //capturar la fila para editar o borrar el registro
  $(".btnElimProd").click(function(){
    idElimProd= $(this).data('id');
    filaProd=$(this).parent('td').parent('tr');
  });
  $(".eliminarp").click(function(){
    $.ajax({
      url: 'Views/Producto/delete.php',
      method:'POST',
      data:{
        id:idElimProd
      }
    }).done(function(res){
      $(filaProd).fadeOut(1000);
    });     
  });

  var idElimSem= -1;
  var filaSem;   //capturar la fila para editar o borrar el registro
  $(".btnElimSem").click(function(){
    idElimSem= $(this).data('id');
    filaSem=$(this).parent('td').parent('tr');
  });
  $(".eliminars").click(function(){
    $.ajax({
      url: 'Views/Seminario/delete.php',
      method:'POST',
      data:{
        id:idElimSem
      }
    }).done(function(res){
      $(filaSem).fadeOut(1000);
    });     
  });

  $("#Tipo_Prod").change(function () {
      //$('#Familia_Prod').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
      $("#Tipo_Prod option:selected").each(function () {
          id_tipo = $(this).val();
          $.post("Views/Producto/familias-upt.php", { id_tipo: id_tipo }, function(data){
              $("#Familia_Prod").html(data);
          });
      });
  })

});