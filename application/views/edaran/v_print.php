<?php
$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Times','B',20);

$pdf->Cell(190,7,'KARANG TARUNA DUSUN BASONGAN',0,1,'C');
$pdf->SetFont('Times','B',14);
$pdf->Cell(190,7,'KELURAHAN KALISALAK KECAMATAN SALAMAN',0,1,'C');
$pdf->Cell(190,7,'KABUPATEN - MAGELANG - JAWA TENGAH',0,1,'C');
$pdf->SetLineWidth(1);
$pdf->Line(20,35,190,35,'C');
$pdf->SetLineWidth(0);
$pdf->Line(20,36,190,36,'C');
$pdf->Line(20,36,190,36,'C');

$pdf->SetFont('Times','',12);
$pdf->Cell(10,10,'',0,1);

$pdf->Cell(130,2,'',0,0);
$pdf->Cell(20,7,'Magelang, ',0,0);
$pdf->Cell(20,7,tgl_indo(date('Y-m-d')),0,1);

$pdf->Cell(190,10,'',0,1);
$pdf->Cell(10,2,'',0,0);
$pdf->Cell(10,2,'Kepada',0,0);
$pdf->Cell(10,2,'',0,0);
$pdf->MultiCell(100,2,': '.$kepada,0,1);

$pdf->Cell(190,4,'',0,1);
$pdf->Cell(10,2,'',0,0);
$pdf->Cell(10,2,'Perihal',0,0);
$pdf->Cell(10,2,'',0,0);
$pdf->MultiCell(100,2,': '.$perihal,0,1);

$pdf->Cell(190,4,'',0,1);
$pdf->Cell(10,2,'',0,0);
$pdf->Cell(10,2,'Lampiran',0,0);
$pdf->Cell(10,2,'',0,0);
$pdf->MultiCell(100,2,': '.$lampiran,0,1);

$pdf->Cell(190,10,'',0,1);
$pdf->Cell(10,2,'',0,0);
$pdf->Cell(10,2,'Dengan hormat,',0,1);

$pdf->Cell(190,10,'',0,1);
$pdf->Cell(10,2,'',0,0);
$pdf->MultiCell(180,6,'Bersama dengan ini kami mengharap kehadiran seluruh '.strtolower($kepada).' Dusun Basongan untuk menghadiri rapat yang akan dilaksanakan pada :',0,1);

$pdf->Cell(190,4,'',0,1);
$pdf->Cell(20,2,'',0,0);
$hari = day_indo(date('l', strtotime($tanggal)));
$pdf->Cell(25,2,'Hari/Tanggal ',0,0);
$pdf->Cell(100,2,': '.$hari.', '.tgl_indo($tanggal),0,1);

$pdf->Cell(190,4,'',0,1);
$pdf->Cell(20,2,'',0,0);
$pdf->Cell(25,2,'Waktu ',0,0);
$pdf->Cell(100,2,': '.$waktu.' WIB',0,1);

$pdf->Cell(190,4,'',0,1);
$pdf->Cell(20,2,'',0,0);
$pdf->Cell(25,2,'Tempat ',0,0);
$pdf->Cell(100,2,': '.$tempat,0,1);

$pdf->Cell(190,4,'',0,1);
$pdf->Cell(20,2,'',0,0);
$pdf->Cell(25,2,'Acara ',0,0);
$pdf->Cell(100,2,': '.$acara,0,1);

$pdf->Cell(190,10,'',0,1);
$pdf->Cell(10,2,'',0,0);
$pdf->MultiCell(180,6,'Demikian surat undangan ini kami buat, atas perhatian dan partisipasi serta kehadiranya kami ucapkan, Terimakasih',0,1);

$pdf->Cell(190,20,'',0,1);
$pdf->Cell(135,2,'',0,0);
$pdf->MultiCell(40,6,'Hormat Saya,
	Ketua Karang Taruna Dusun Basongan',0,'C');
$pdf->Cell(190,30,'',0,1);
$pdf->Cell(135,2,'',0,0);
$pdf->MultiCell(40,6,'Muhammad Syarif',0,'C');

$pdf->Output();
?>