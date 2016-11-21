<?php
    require('fpdf.php');
    require('bdd.php');

    $pdf = new FPDF();

    $pdf->AddPage();
    $pdf->SetFont('arial','B', 12);
    $pdf->SetTextColor(47,48,50);

    $pdf->Cell(0,0,utf8_decode("Fin d'adhésion"),0,1,'C',false);
    $pdf->Ln(10); // Le titre sera à 10 millimètres de mon tableau

    $pdf->SetFontSize(9);
    $pdf->SetFillColor(47,48,50);
    $pdf->SetTextColor(247,247,247);

    $pdf->Cell(35,10,utf8_decode("Nom"),0,0,'C',true);
    $pdf->Cell(35,10,"Prénom",0,0,'C',true);
    $pdf->Cell(30,10,"Sexe",0,0,'C',true);
    $pdf->Cell(30,10,"type",0,0,'C',true);
    $pdf->Cell(30,10,utf8_decode("Début"),0,0,'C',true);
    $pdf->Cell(35,10,"Fin",0,1,'C',true);

    $pdf->SetFillColor(232,232,232);
    $pdf->SetTextColor(69,137,182);
    $pdf->SetFont('Arial','',9);

        $ask = $bdd->query("SELECT * FROM adherants");
            while ($donnees = $ask->fetch()) 
                {
                    $pdf->Cell(35,10,utf8_decode($donnees['nom']),0,0,'C',true);
                    $pdf->Cell(35,10,utf8_decode($donnees['prenom']),0,0,'C',true);
                    $pdf->Cell(30,10,$donnees['sexe'],0,0,'C',true);
                    $pdf->Cell(30,10,$donnees['type'],0,0,'C',true);
                    $pdf->Cell(30,10,$donnees['d_adhesion'],0,0,'C',true);
                    $pdf->SetFont('Arial','B',9);
                    $pdf->SetTextColor(255,0,0);
                    $pdf->Cell(35,10,$donnees['f_adhesion'],0,1,'C',true);
                    $pdf->SetFont('Arial','',9);
                    $pdf->SetTextColor(69,137,182);
                }

    $pdf->Output('adherents.pdf', 'D'); // sauve ou envoie le document