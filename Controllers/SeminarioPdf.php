<?php
      require_once('../connection.php');
      include_once('PlantillaSeminarioPdf.php');

      $db=Db::getConnect();
      $sql= $db->prepare('SELECT * FROM seminario WHERE Id_Sem=:seminario');
      $sql->bindParam(':seminario',$_GET['seminario']);
      $sql->execute();
      $seminario=$sql->fetchAll();

      //$pdf = new FPDF([string orientación [, string unidad [, mixed formato]]);
      //--Orientación [P:vertical, L:horizontal]
      //--Unidad de medida [mm:milimetro, pt:punto, cm:centímetro, in:pulgada]
      //--Formato de página [A4, A3, A5, Letter, Legal]
      //$pdf = new FPDF('P','mm','A4');  //Ejemplo por defecto
      $pdf = new PlantillaSeminarioPdf();
      $pdf->AliasNbPages();
      //$pdf->AddPage([string orientacion[,mixed formato]]);
      //Los parámetros Orientación y Formato son iguales que en FPDF(). Si no existen, cogerá los del constructor
      $pdf->AddPage();
      $pdf->Body($seminario);
      $nombre_sem = $seminario[0]['Titulo_Sem'];
      //formato de salida para el nombre del archivo
      $nombre='SEMINARIO-'.$nombre_sem.'-'.date("Y").'-'.date("m").'-'.date("d");

      //Output([string nombre, string destino])
      //Nombre del archivo [doc.pdf]
      //Destino del envío [I: opción Guardar como, D: envía pdf al navegador preparado para descarga, F: guarda fichero en archivo local, S: devuelve el documento como una cadena ]
      $pdf->Output('I',$nombre.'.pdf');
      ob_end_flush();
  ?>