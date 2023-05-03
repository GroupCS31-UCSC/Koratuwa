
<?php
    require '../app/fpdf/fpdf.php';
    
    
     function  generatePdf(){
        $pdf = new FPDF();
        return $pdf;
     }
?>