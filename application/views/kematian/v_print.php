<?php 
$pdf = new FPDF('p','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Times','B',14);

	$jabatan = $this->session->userdata('masuk');
	foreach ($admin as $key) 
	{
		$alamat = $key->alamat;
		$rt = $key->rt;
	}

	if ($jabatan == 'kadus') 
	{
		$kadus = 'Kepala Dusun';
	} elseif ($jabatan == 'rw') 
		{
			$rw = 'Ketua RW 05';
		}

	$pdf->Image('assets/foto/magelang.png',10,8,20,25);
	$pdf->Cell(190,7,'PEMERINTAH KABUPATEN MAGELANG',0,1,'C');
	$pdf->Cell(190,7,'KECAMATAN SALAMAN KELURAHAN KALISALAK',0,1,'C');

	if ($jabatan == 'kadus') 
	{
		$pdf->Cell(190,7,'DUSUN BASONGAN',0,1,'C');
	} elseif ($jabatan == 'rt')
		{
			$pdf->Cell(190,7,'RT '.$rt.' RW 05 DUSUN BASONGAN',0,1,'C');
		} elseif ($jabatan == 'rw') 
			{
				$pdf->Cell(190,7,'RW 05 DUSUN BASONGAN',0,1,'C');
			}

	$pdf->SetLineWidth(1);
	$pdf->Line(10,35,200,35,'C');
	$pdf->SetLineWidth(0);
	$pdf->Line(9.7,36,200,36,'C');

	$pdf->Cell(10,6,'',0,1);
	$pdf->Cell(10,6,'',0,1);
	$pdf->SetFont('Times','BU',12);
	$pdf->Cell(190,6,'SURAT KETERANGAN KEMATIAN',0,1,'C');
	$pdf->SetFont('Times','',12);
	$pdf->Cell(190,6,'Nomor :      /       /      / 2020',0,1,'C');

	$pdf->Cell(10,6,'',0,1);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(190,6,'Yang bertanda tangan di bawah ini :',0,1);
	
	$pdf->Cell(10,1,'',0,1);
	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(15,6,'Nama',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(160,6,$this->session->userdata('ses_name'),0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(15,6,'Jabatan',0,0);
	$pdf->Cell(3,6,':',0,0);
	if ($jabatan == 'kadus') 
	{
		$pdf->Cell(160,6,$kadus,0,1);
	} elseif ($jabatan == 'rt') 
		{
			$pdf->Cell(160,6,'Ketua RT '.$rt,0,1);
		} elseif ($jabatan == 'rw') 
			{
				$pdf->Cell(160,6,'Ketua RW',0,1);
			}

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(15,6,'Alamat',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->MultiCell(160,6,$alamat,0,1);

	$pdf->Cell(190,6,'Dengan ini menerangkan bahwa :',0,1);
	
	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'No KTP',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(150,6,$ktp,0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'Nama Lengkap',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(150,6,$nama,0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'Jenis Kelamin',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(150,6,$kelamin,0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'Tanggal Lahir',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(150,6,tgl_indo($ttl),0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'Umur',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(150,6,$umur,0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'Agama',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(150,6,$agama,0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(27,6,'Alamat',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->MultiCell(150,6,$alamat,0,1);

	$pdf->MultiCell(190,6,'Menurut Sepengetahuan kami nama tersebut di atas dengan alamat tersebut di atas telah Meninggal Dunia pada :',0,1);

	$pdf->Cell(10,2,'',0,1);
	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(30,6,'Tanggal',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->Cell(147,6,tgl_indo($tgl_mati),0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(30,6,'Sebab Kematian',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->MultiCell(147,6,$sebab,0,1);

	$pdf->Cell(10,6,'',0,0);
	$pdf->Cell(30,6,'Tempat Kejadian',0,0);
	$pdf->Cell(3,6,':',0,0);
	$pdf->MultiCell(147,6,$lokasi,0,1);

	$pdf->Cell(10,2,'',0,1);

	$pdf->MultiCell(190,6,'Demikian surat keterangan kematian ini kami buat dengan sebenarnya untuk digunakan sebagaimana mestinya',0,1);
	$pdf->Cell(190,6,'',0,1);
	$pdf->Cell(190,6,'',0,1);
	$pdf->Cell(190,6,'',0,1);

	$pdf->Cell(129,6,'',0,0);
	$pdf->Cell(61,6,'Dibuat di : Basongan',0,1);

	$pdf->Cell(129,6,'',0,0);
	$pdf->Cell(25,6,'Pada Tanggal',0,0);
	$pdf->Cell(3,6,':',0,0);
	// $pdf->Cell(0,6,'',0,0);
	$pdf->MultiCell(200,6,tgl_indo($tgl),0,1);

	$pdf->Cell(190,6,'',0,1);

	
	$pdf->Cell(61,6,'Pemohon',0,0,'C');
	$pdf->Cell(68,6,'',0,0);
	if ($jabatan == 'kadus') 
	{
		$pdf->Cell(61,6,$kadus,0,1,'C');
	} elseif ($jabatan == 'rt') 
		{
			$pdf->Cell(61,6,'Ketua RT '.$rt,0,1,'C');
		} elseif ($jabatan == 'rw') 
			{
				$pdf->Cell(61,6,$rw,0,1,'C');
			}

	$pdf->Cell(190,6,'',0,1);
	$pdf->Cell(190,6,'',0,1);
	$pdf->Cell(190,6,'',0,1);
	$pdf->Cell(190,6,'',0,1);

	$pdf->SetFont('Times','B',12);
	$pdf->Cell(62,6,'( '.$pemohon.' )',0,0,'C');
	$pdf->Cell(68,6,'',0,0);
	$pdf->Cell(61,6,'( '.$this->session->userdata('ses_name').' )',0,1,'C');

	$pdf->OutPut();
?>