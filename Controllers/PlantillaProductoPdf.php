<?php 
require('fpdf/fpdf.php');
class PlantillaProductoPdf extends FPDF
{
	function Header()
    {
        //Imagen
        //Image(string file [, float x [, float y [, float w [, float h [, string type [, mixed link]]]]]]);
        //file: Directorio del archivo de la imagen.
        //x: Abscisa de la esquina superior izquierda. Por defecto se utilizará la abscisa actual.
        //y: Ordenada de la esquina superior izquierda. Por defecto se utilizará la ordenada actual.
        //w: Ancho de la imagen en la página.
        //h: Alto de la imagen en la página.
        //type: Formato de la imagen.
        //link: identificador devuelto por el método AddLink() o la url del enlace.
        $this->Image('../assets/img/pdf/encabezadopdf.jpg',20,10,165);
        
        //linea
        $this->Line(20, 68, 185, 68);
        // Salto de línea
        $this->Ln(60);
    }
    function Body($producto)
    {
        //SetFont(string familia[, string estilo [, float size]]);
        //--Familia de Fuente [Courier, Helvetica o Arial, Times, Symbol, ZapfDingbats) o añadir una mediante AddFont();
        //--Estilo de Fuente [Regular, Negrita, Itálica, Subindice]
        //--Size: Tamaño de Fuente en pts [12]
        //--SetFont('Helvetica','I',13);    //Ejemplo
        $this->SetFont('Arial','B',15);
        $this->SetXY(60, 70);
        //Cell(float w [, float h [, string texto [, mixed borde [, int ln [, string align [, boolean fill [, mixed link]]]]]]])
        //--Ancho w [0] La celda se extiende hasta el margen derecho
        //--Alto h []
        //--Contenido texto []
        //--Borde [0] no es visible, [1] es visible
        //--Ln donde se empezará a escribir después de llamar a la función [0] derecha [1] comienzo de siguiente línea [2] debajo
        //--Align alinear texto [L: izquierda, C: centrado, R: derecha]
        //Fill color de fondo de celda [True, False]
        $this->Cell(60,10, utf8_decode('INFORMACIÓN DE PRODUCTO'));

        $this->SetXY(20, 80);
        $this->SetFont('Arial','B',12);
        $this->Cell(70,5,utf8_decode('Imagen:'),0);
        $this->SetFont('Arial','B',12);
        $this->Cell(30,5,utf8_decode('Nombre:'),0);
        $this->SetFont('Arial','',11);
        //$this->MultiCell(65,5,utf8_decode('Hohnner Mussete'),0);
        $this->MultiCell(65,5,utf8_decode($producto[0]['Nombre_Prod']));
        //$this->Ln();    //Salto de línea

        $this->SetXY(20, $this->GetY());
        $this->Cell(70,5,utf8_decode(''),0);
        $this->Image(utf8_decode('../'.$producto[0]['Imagen_Prod']),20,85,68);
        //$this->MultiCell(68,5,utf8_decode($producto[0]['Imagen_Prod']));
        $this->SetFont('Arial','B',12);
        $this->Cell(30,5,utf8_decode('Descripción:'),0);
        $this->SetFont('Arial','',11);
        //$this->MultiCell(65,5,utf8_decode('Octavas: 3 Color: Rojo Teclas sensibles al tacto'),0);
        $this->MultiCell(65,5,utf8_decode($producto[0]['Descripcion_Prod']));

        $this->SetXY(20, $this->GetY());
        $this->Cell(70,5,utf8_decode(''),0);
        $this->SetFont('Arial','B',12);
        $this->Cell(30,5,utf8_decode('Tipo:'),0);
        $this->SetFont('Arial','',11);
        //$this->MultiCell(65,5,utf8_decode('Instrumento'),0);
        $this->MultiCell(65,5,utf8_decode($producto[0]['Tipo_Prod']));

        $this->SetXY(20, $this->GetY());
        $this->Cell(70,5,utf8_decode(''),0);
        $this->SetFont('Arial','B',12);
        $this->Cell(30,5,utf8_decode('Familia:'),0);
        $this->SetFont('Arial','',11);
        //$this->MultiCell(65,5,utf8_decode('Acordeón'),0);
        $this->MultiCell(65,5,utf8_decode($producto[0]['Familia_Prod']));
        
        $this->SetXY(20, $this->GetY());
        $this->Cell(70,5,utf8_decode(''),0);
        $this->SetFont('Arial','B',12);
        $this->Cell(30,5,utf8_decode('Precio:'),0);
        $this->SetFont('Arial','',11);
        //$this->MultiCell(65,5,utf8_decode('$5.00'),0);
        $this->MultiCell(65,5,utf8_decode($producto[0]['Precio_Prod']));
    }
    function Footer()
    {
        //linea
        $this->Line(20, 280, 185, 280);

        $this->SetXY(20, -15);   //Posiciona el pie a 1,5 cm del final.
        $this->SetFont('Arial','B',8);
        $this->Cell(16,5,utf8_decode('Dirección:'),0);
        $this->SetFont('Arial','',8);
        $this->Cell(55,5,utf8_decode('Av. Daniel León Borja y Juan de Lavalle'),0,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(10,5,utf8_decode(''),0,0,'C');
        $this->SetFont('Arial','B',8);
        $this->Cell(22,5,utf8_decode('Teléfono:'),0);
        $this->SetFont('Arial','',8);
        $this->Cell(27,5,utf8_decode('593 (03) 2 964 196'),0);

        $this->SetFont('Arial','I',8);
        $this->Cell(35,5,utf8_decode('Página '.$this->PageNo().' de {nb}'),0,0,'R');  //Imprime el número de página actual
        //Con margen que se extiende hasta el margen de la derecha
        //Alto de celda de 10 (el formato de medida depende del dado al inicio)
        //un texto similar a: Page 2
        //Sin borde, con salto de línea a la derecha y texto centrado

        $this->Ln();

        $this->SetXY(20, -10);
        $this->SetFont('Arial','B',8);
        $this->Cell(16,5,utf8_decode(''),0);
        $this->SetFont('Arial','',8);
        $this->Cell(55,5,utf8_decode('Riobamba - Ecuador'),0,0,'C');
        $this->SetFont('Arial','',8);
        $this->Cell(10,5,utf8_decode(''),0,0,'C');
        $this->SetFont('Arial','B',8);
        $this->Cell(22,5,utf8_decode('Código Postal:'),0);
        $this->SetFont('Arial','',8);
        $this->Cell(27,5,utf8_decode('EC060104'),0);
    }
}