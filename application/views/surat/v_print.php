<?php 
 $pdf = new FPDF('p','mm','A4'); //l artinya landscape, p artinya potrait, A5 adalah ukuran kertas
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Times','B',14);
        // mencetak string


        $jabatan = $this->session->userdata('masuk');
        //         if ($jabatan == 'kadus') 
        //         {
                        $kadus = 'Kepala Dusun';
        //                 foreach ($rt_admin as $key) 
        //                 {
        //                         $alamat_kadus = $key->alamat;
        //                 }
        //         } elseif ($jabatan=='rt') 
        //                 {
        //                         foreach ($rt_admin as $key) 
        //                         {
        //                                 $rtadmin = $key->rt;
        //                                 $alamat_rt = $key->alamat;
        //                         }
        //                 } elseif ($jabatan=='rw') 
        //                         {
                                        $rw = 'Ketua RW 05';
        //                                 foreach ($rt_admin as $key) 
        //                                 {
        //                                         $alamat_rw = $key->alamat;
        //                                 }
        //                         }

        $pdf->Image('assets/foto/magelang.png',10,8,20,25);
        $pdf->Cell(190,7,'PEMERINTAH KABUPATEN MAGELANG',0,1,'C'); // C adalah Center,190 adalah panjang cellnya, 7 adalah lebar cellnya, 0 adalah dengan garis jika 1 dan 0 tidak dengan garis, 1 adalah agar jika ada cell lagi maka dibawahnya
        $pdf->Cell(190,7,'KECAMATAN SALAMAN KELURAHAN KALISALAK',0,1,'C');

        if ($this->session->userdata('masuk')=='kadus') 
        {
                $pdf->Cell(190,7,'DUSUN BASONGAN',0,1,'C');
        } elseif ($this->session->userdata('masuk')=='rt') 
                {
                        $pdf->Cell(190,7,'RT '.$this->session->userdata('ses_rt').' RW 05 DUSUN BASONGAN',0,1,'C');
                } elseif ($this->session->userdata('masuk')=='rw') 
                        {
                                $pdf->Cell(190,7,'RW 05 DUSUN BASONGAN',0,1,'C');
                        }

        $pdf->SetLineWidth(1); // untuk mengatur tebal garis
        $pdf->Line(10,35,200,35,'C');// untuk membuat garis, 10 adalah jarak tepi kiri, dua angka 35 adalah mengatur posisi tinggi letak garis, 200 adalah panjang garis
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetLineWidth(0);
        $pdf->Line(9.7,36,200,36,'C');
        $pdf->Line(9.7,36,200,36,'C');

        $pdf->SetFont('Times','BU',12);
        $pdf->Cell(10,4,'',0,1);
        if ($jabatan == 'kadus') 
        {
                $pdf->Cell(10,6,'',0,1);
        } else {
                $pdf->Cell(10,4,'',0,1);
        }
        $pdf->Cell(190,6,'SURAT '.strtoupper($jenis),0,1,'C');
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
        $pdf->MultiCell(160,6,': '.$this->session->userdata('ses_name'),0,1);

        
        $pdf->cell(10,6,'',0,0);
        $pdf->cell(10,6,'Jabatan',0,0);
        $pdf->cell(10,6,'',0,0);
        if ($jabatan == 'kadus') 
        {
                $pdf->MultiCell(160,6,': '.$kadus,0,1);
        }

        if ($jabatan == 'rt') 
        {
                $pdf->MultiCell(160,6,': Ketua RT '.$this->session->userdata('ses_rt'),0,1);
        }

        if ($jabatan == 'rw') 
        {
                $pdf->MultiCell(160,6,': '.$rw,0,1);
        }

        $pdf->Cell(10,6,'',0,0);
        $pdf->Cell(10,6,'Alamat',0,0);
        $pdf->Cell(10,6,'',0,0);

        $pdf->Cell(2,6,': ',0,0);
        $pdf->MultiCell(158,6,$this->session->userdata('ses_alamat'),0,1);

        $pdf->Cell(10,3,'',0,1);
        $pdf->Cell(10,6,'Dengan ini menerangkan bahwa :',0,1);
        if ($jenis == "Pengantar Pembuatan KK" || $jenis == 'Pengantar Catatan Kepolisian') 
        {
                $pdf->Cell(10,2,'',0,1);
                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Nama Lengkap',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,$nama,0,1);

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'No KTP / NIK',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,$ktp,0,1);

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Tanggal Lahir',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,$ttl,0,1);

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Jenis Kelamin',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,$kelamin,0,1);

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Umur',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,''.$umur.' Tahun',0,1);

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

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Keperluan',0,0);
                $pdf->Cell(2,6,': ',0,0);

                if ($jenis == 'Pengantar Pembuatan KTP') 
                {
                        $pdf->MultiCell(136,6,'Melengkapi Persyaratan Pembuatan KTP',0,1);
                } elseif ($jenis == 'Pengantar Pembuatan KK') 
                        {
                                $pdf->MultiCell(136,6,'Melengkapi Persyaratan Pembuatan Kartu Keluarga (KK)',0,1);
                        } elseif ($jenis == 'Pengantar Catatan Kepolisian') 
                                {
                                        $pdf->MultiCell(136,6,'Melengkapi Persyaratan Pembuatan Surat Keterangan Catatan Kepolisian (SKCK)',0,1);
                                }

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Keterangan Lain',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,$lain,0,1);

                $pdf->Cell(10,6,'',0,0);
                $pdf->Cell(42,6,'Berlaku Mulai Tanggal',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->MultiCell(136,6,tgl_indo($tanggal).' s/d '.tgl_indo($berlaku),0,1);

                $pdf->Cell(10,2,'',0,1);
                $pdf->MultiCell(190,6,'Demikian Surat Pengantar ini dibuat untuk digunakan seperlunya.',0,1);

                // $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(128,6,'',0,0);
                $pdf->Cell(25,6,'Dibuat di ',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->Cell(35,6,'Basongan',0,0);

                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(128,6,'',0,0);
                $pdf->SetFont('Times','U',12);
                $pdf->Cell(25,6,'Pada Tanggal ',0,0);
                $pdf->Cell(2,6,': ',0,0);
                $pdf->Cell(35,6,tgl_indo($tanggal),0,0);

                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(10,4,'',0,1);
                $pdf->Cell(11,6,'',0,0);
                $pdf->SetFont('Times','',12);
                $pdf->Cell(45,6,'Tanda Tangan Pemegang',0,0);
                $pdf->Cell(81,6,'',0,0);
                if ($jabatan == 'kadus') 
                {
                        $pdf->Cell(45,6,'Kepala Dusun Basongan',0,0,'C');
                } elseif ($jabatan == 'rt' || $jabatan == 'rw') 
                {
                        if ($jabatan == 'rt') 
                        {
                                $pdf->Cell(45,6,'Ketua RT '.$this->session->userdata('ses_rt'),0,0,'C');
                        } elseif ($jabatan == 'rw') 
                                {
                                        $pdf->Cell(45,6,'Ketua RW 05',0,0,'C');
                                }
                }

                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(10,2,'',0,1);
                $pdf->Cell(10,2,'',0,1);
                
                $pdf->Cell(45,6,'',0,1);
                
                $pdf->Cell(10,6,'',0,1);
                $pdf->Cell(11,6,'',0,0);
                $pdf->SetFont('Times','B',12);
                $pdf->Cell(45,6,'( '.$nama.' )',0,0,'C');
                $pdf->Cell(81,6,'',0,0);
                $pdf->Cell(45,6,'( '.$this->session->userdata('ses_name').' )',0,0,'C');

        } elseif ($jenis == "Pengantar Akta Kelahiran") 
                {
                        $pdf->Cell(10,2,'',0,1);
                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Nama Lengkap',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$nama,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'No KTP / NIK',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$ktp,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Tanggal Lahir',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$ttl,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Jenis Kelamin',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$kelamin,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Umur',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,''.$umur.' Tahun',0,1);

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

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Keperluan',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,'Melengkapi persyaratan pembuatan Akta Kelahiran',0,1);

                        $pdf->Cell(10,3,'',0,1);
                        $pdf->Cell(10,6,'Dengan keterangan anak :',0,1);

                        $pdf->Cell(10,2,'',0,1);
                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Nama Lengkap',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$anak,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Tanggal Lahir',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,tgl_indo($ttlanak),0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Nama Ayah',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$ayah,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Nama Ibu',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$ibu,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Keterangan',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,'Anak tersebut diatas adalah anak kandung sah pasangan suami istri '.$ayah.' dan '.$ibu,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Berlaku Mulai Tanggal',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,tgl_indo($tanggal).' s/d '.tgl_indo($berlaku),0,1);

                        $pdf->Cell(10,2,'',0,1);
                        $pdf->MultiCell(190,6,'Demikian Surat Pengantar ini dibuat untuk digunakan seperlunya.',0,1);

                        // $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(128,6,'',0,0);
                        $pdf->Cell(25,6,'Dibuat di ',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->Cell(35,6,'Basongan',0,0);

                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(128,6,'',0,0);
                        $pdf->SetFont('Times','U',12);
                        $pdf->Cell(25,6,'Pada Tanggal ',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->Cell(35,6,tgl_indo($tanggal),0,0);

                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(10,4,'',0,1);
                        $pdf->Cell(11,6,'',0,0);
                        $pdf->SetFont('Times','',12);
                        $pdf->Cell(45,6,'Tanda Tangan Pemegang',0,0);
                        $pdf->Cell(81,6,'',0,0);
                         
                        $pdf->Cell(45,6,'Kepala Dusun Basongan',0,0,'C');

                        $pdf->Cell(45,6,'',0,1);
                
                        $pdf->Cell(10,18,'',0,1);
                        $pdf->Cell(11,6,'',0,0);
                        $pdf->SetFont('Times','B',12);
                        $pdf->Cell(45,6,'( '.$nama.' )',0,0,'C');
                        $pdf->Cell(81,6,'',0,0);
                        $pdf->Cell(45,6,'( '.$this->session->userdata('ses_name').' )',0,0,'C');

                } elseif ($jenis == 'Pengantar Pindah Penduduk' ) 
                {
                        $pdf->Cell(10,2,'',0,1);
                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Nama Lengkap',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$nama,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'No KTP / NIK',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$ktp,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'No KK',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$kk,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Tanggal Lahir',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$ttl,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Jenis Kelamin',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$kelamin,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Umur',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,''.$umur.' Tahun',0,1);

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
                        $pdf->Cell(42,6,'Alamat Asal',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$alamat,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Berlaku Mulai Tanggal',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,tgl_indo($tanggal).' s/d '.tgl_indo($berlaku),0,1);

                        $pdf->Cell(10,2,'',0,1);
                        $pdf->MultiCell(190,6,'Pindah Ke :',0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Desa / Kelurahan',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$desa,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Kecamatan',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$kec,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Kota / Kabupaten',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$kab,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Provinsi',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$prov,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Alasan Pindah',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$alasan,0,1);

                        $pdf->Cell(10,6,'',0,0);
                        $pdf->Cell(42,6,'Anggota Keluarga',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->MultiCell(136,6,$jumlah,0,1);

                        $pdf->Cell(10,2,'',0,1);
                        $pdf->MultiCell(190,6,'Demikian Surat Pengantar ini dibuat untuk digunakan seperlunya.',0,1);

                        // $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(128,6,'',0,0);
                        $pdf->Cell(25,6,'Dibuat di ',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->Cell(35,6,'Basongan',0,0);

                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(128,6,'',0,0);
                        $pdf->SetFont('Times','U',12);
                        $pdf->Cell(25,6,'Pada Tanggal ',0,0);
                        $pdf->Cell(2,6,': ',0,0);
                        $pdf->Cell(35,6,tgl_indo($tanggal),0,0);

                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(10,6,'',0,1);
                        $pdf->Cell(10,4,'',0,1);
                        $pdf->Cell(11,6,'',0,0);
                        $pdf->SetFont('Times','',12);
                        $pdf->Cell(45,6,'Tanda Tangan Pemegang',0,0);
                        $pdf->Cell(81,6,'',0,0);
                         
                        $pdf->Cell(45,6,'Kepala Dusun Basongan',0,0,'C');

                        $pdf->Cell(45,6,'',0,1);
                
                        $pdf->Cell(10,18,'',0,1);
                        $pdf->Cell(11,6,'',0,0);
                        $pdf->SetFont('Times','B',12);
                        $pdf->Cell(45,6,'( '.$nama.' )',0,0,'C');
                        $pdf->Cell(81,6,'',0,0);
                        $pdf->Cell(45,6,'( '.$this->session->userdata('ses_name').' )',0,0,'C');       
                }
        $pdf->Output();
?>