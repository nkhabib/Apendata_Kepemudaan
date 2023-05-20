<?php 
$jab = $this->session->userdata('masuk');

if ($jab == "kadus") 
{
        $jabatan = "Kepala Dusun";
} elseif ($jab == "rt") 
        {
                $jabatan = "Ketua RT.".$rtadmin;
        } elseif ($jab == "rw") 
        {
                $jabatan == "Ketua RW.05";
        }


 $pdf = new FPDF('p','mm','A4'); //l artinya landscape, p artinya potrait, A5 adalah ukuran kertas
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',14);
        // mencetak string


        $pdf->Image('assets/foto/magelang.png',10,8,20,25);
        $pdf->Cell(190,7,'PEMERINTAH KABUPATEN MAGELANG',0,1,'C'); // C adalah Center,190 adalah panjang cellnya, 7 adalah lebar cellnya, 0 adalah dengan garis jika 1 dan 0 tidak dengan garis, 1 adalah agar jika ada cell lagi maka dibawahnya
        $pdf->Cell(190,7,'KECAMATAN SALAMAN KELURAHAN KALISALAK',0,1,'C');
        $pdf->Cell(190,7,'DUSUN BASONGAN',0,1,'C');
        $pdf->SetLineWidth(1); // untuk mengatur tebal garis
        $pdf->Line(10,35,200,35,'C');// untuk membuat garis, 10 adalah jarak tepi kiri, dua angka 25 adalah mengatur posisi tinggi letak garis, 200 adalah panjang garis
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetLineWidth(0);
        $pdf->Line(9.7,36,200,36,'C');
        $pdf->Line(9.7,36,200,36,'C');
        
        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(10,4,'',0,1);
        
        $pdf->Cell(10,6,'',0,1);

        $pdf->Cell(190,6,'SURAT PENGANTAR KTP',0,1,'C');
        $pdf->SetFont('Times','',12);
        $pdf->Cell(190,6,'Nomor :      /       /      / '.date('Y'),0,1,'C');

        // $pdf->Cell(10,7,'',0,1);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Times','',12);

        $pdf->MultiCell(190,6,'Yang bertanda tangan di bawah ini :',0,1);

        $pdf->Cell(10,2,'',0,1);
        
        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(10,6,'Nama',0,0);
        $pdf->Cell(10,6,'',0,0);
        $pdf->MultiCell(160,6,': '.$namaadmin,0,1);

        
        $pdf->cell(10,6,'',0,0);
        $pdf->cell(10,6,'Jabatan',0,0);
        $pdf->cell(10,6,'',0,0);
        
        $pdf->MultiCell(160,6,': '.$jabatan,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(10,6,'Alamat',0,0);
        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(158,6,$alamatadmin,0,1);

        $pdf->Cell(10,3,'',0,1);
        $pdf->Cell(10,6,'Dengan ini menerangkan bahwa :',0,1);
        $pdf->Cell(10,2,'',0,1);
        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Nama Lengkap',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$nama,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Nomor KK',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$noKK,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Tanggal Lahir',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,tgl_indo($ttl),0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Jenis Kelamin',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$kelamin,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Umur',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$umur,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Status',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$status,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Agama',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$agama,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Pekerjaan',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$kerja,0,1);

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Alamat',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,$alamat,0,1);

        $pdf->Cell(10,2,'',0,1);
        $pdf->MultiCell(190,6,'Nama tersebut diatas benar-benar penduduk Dusun Basongan Desa Kalisalak Kecamatan Salaman Kabupaten Magelang',0,1);

        $pdf->Cell(10,10,'',0,1);
        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(42,6,'Berlaku Mulai Tanggal',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(136,6,tgl_indo($tanggal).' s/d '.tgl_indo($berlaku),0,1);

        $pdf->Cell(10,10,'',0,1);
        $pdf->MultiCell(190,6,'Demikian Surat Pengantar ini dibuat untuk digunakan seperlunya.',0,1);

        // $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(128,6,'',0,0);
        $pdf->Cell(25,6,'Dibuat di ',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->Cell(35,6,'Basongan',0,0);

        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(128,6,'',0,0);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(25,6,'Pada Tanggal ',0,0);
        $pdf->Cell(2,6,': ',0,0);
        $pdf->Cell(35,6,tgl_indo($tanggal),0,0);

        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,6,'',0,1);
        $pdf->Cell(10,4,'',0,1);
        $pdf->Cell(11,6,'',0,0);
        $pdf->SetFont('Times','',12);
        $pdf->Cell(45,6,'',0,0);
        $pdf->Cell(81,6,'',0,0);
         
        $pdf->Cell(45,6,$jabatan,0,0,'C');

        $pdf->Cell(45,6,'',0,1);

        $pdf->Cell(10,20,'',0,1);
        $pdf->Cell(11,6,'',0,0);
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(45,6,'',0,0,'C');
        $pdf->Cell(81,6,'',0,0);
        $pdf->Cell(45,6,'( '.$namaadmin.' )',0,0,'C');       

        $pdf->Output();
?>