<?php 
class M_penduduk extends CI_Model
{
	function get_penduduk($perpage,$offset)
	{
        $this->db->order_by('id_rt','ASC');
        $this->db->where('tahun',date('Y'));
        $this->db->where('status !=','Meninggal');
		return $this->db->get("penduduk",$perpage,$offset)->result();
	}

    function rt()
    {
        return $this->db->get('rt')->result();
    }

	function add($post)
	{
		$rtal = $this->db->get_where('rt',['id_rt' => $post['rt']])->row_array();
		
		$almt = "RT.".$rtal['rt']." /RW.05, Basongan, Kalisalak";
		

		$ktp = $post['ktp']; //'no_ktp' sesuai nama filed di database, 'noktp' adalah name pada form di view
		$kk = $post['kk'];
		$nama = $post['nama'];
		$tempat = $post['tempat'];
		$ttl = $post['ttl'];
		$kelamin = $post['kelamin'];
		$umur = $post['umur'];
        $agama = $post['agama'];
		$status = $post['status'];
		$statuskeluarga = $post['statuskeluarga'];
		$statuskk = $post['statuskk'];
		$alamat = $almt;
		$pekerjaan = $post['pekerjaan'];
		$rt = $post['rt'];
		//'jabatan => empty($post['jabatan']) ? null : $post['jabatan']',
		//artinya jika form jabatan kosong maka akan menambah kosong didatabase tapi jika ada isinya maka akan mengisi sesuai isi form

		// foreach ($ktp as $key) 
  //       {
            $this->db->where('no_ktp',$ktp);
            $this->db->where('tahun',date('Y'));
            $ada = $this->db->get('penduduk')->result();
        // }

		if (!$ada) 
		{
            $tahun = date('Y');
            $data =array(
				'no_ktp' => $ktp,
				'no_kk' => $kk,
				'nama' => $nama,
				'tempat_lahir' => $tempat,
				'tanggal_lahir' => $ttl,
				'jenis_kelamin' => $kelamin,
				'umur' => $umur,
                'agama' => $agama,
				'status' => $status,
				'statuskeluarga' => $statuskeluarga,
				'kepalakk' => $statuskk,
				'alamat' => $alamat,
				'pekerjaan' => $pekerjaan,
				'id_rt' => $rt,
                'tahun' => $tahun,
            );

			$tambah = $this->db->insert('penduduk', $data);

			if ($tambah) 
			{
				$itung = count($ktp);
				echo $this->session->set_flashdata('msg', '<p>'.$itung.' Data Berhasil Ditambahkan</p>');
				redirect('penduduk/penduduk/get_penduduk');
			} else
				{
					echo $this->session->set_flashdata('gagal', '<p>Data Gagal Ditambahkan</p>');
				}
		} else
			{
				echo $this->session->set_flashdata('gagal','<p> No KTP yang anda masukan sudah ada');
				redirect('penduduk/penduduk/input_penduduk');
			}
	}

	function caripenduduk($berdasarkan,$yangdicari)
	{
		$this->db->where('tahun',date('Y'));
		$this->db->where('status !=','Meninggal');
		$this->db->from('penduduk');
		$this->db->join('rt','rt.id_rt = penduduk.id_rt');

		switch ($berdasarkan) 
		{
			case '':
			$this->db->like('no_ktp',$yangdicari);
			$this->db->like('no_kk',$yangdicari);
			$this->db->or_like('nama',$yangdicari);
			$this->db->or_like('tanggal_lahir',$yangdicari);
			$this->db->or_like('jenis_kelamin',$yangdicari);
			$this->db->or_like('umur',$yangdicari);
            $this->db->or_like('agama',$yangdicari);
			$this->db->or_like('status',$yangdicari);
			$this->db->or_like('alamat',$yangdicari);
			$this->db->or_like('pekerjaan',$yangdicari);
			$this->db->like('rt',$yangdicari);
				
				break;

				case 'no_ktp':
				$this->db->where($berdasarkan,$yangdicari);

				case 'no_kk':
				$this->db->where($berdasarkan,$yangdicari);

				case 're':
				$this->db->where($berdasarkan,$yangdicari);

			
			default:
			$this->db->like($berdasarkan,$yangdicari);
		}
		return $this->db->get();
	}

	

	function update($data,$id)
    {
        $this->db->where('id_penduduk',$id);
        $update = $this->db->update('penduduk',$data);

        $status = $this->db->get_where('penduduk',['id_penduduk' => $id])->row_array();
        if ($status['status']=="Meninggal") 
        {
            $mati = array(
                'id_penduduk' => $status['id_penduduk'],
                'tanggal_kematian' => date('Y-m-d'),
            );

            $this->db->insert('kematian',$mati);

            $this->db->delete('user',['id_penduduk' => $id]);
            $this->db->delete('seksi',['id_pemuda' => $id]);
            $this->db->delete('rt_rw',['id_penduduk' => $id]);

        }

        return $update;
    }


	function hapus($id)
	{
		$this->db->where('id_penduduk',$id);
		return $this->db->delete('penduduk');
	}

}