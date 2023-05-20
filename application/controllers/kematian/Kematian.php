<?php
class Kematian extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('kematian/m_kematian');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		}		
	}

	function get_kematian($offset=0)
	{
		$this->db->from('kematian');
		$this->db->join('penduduk','penduduk.id_penduduk = kematian.id_penduduk');
		$kematian = $this->db->get("");

		$config['total_rows'] = $kematian->num_rows();
		$config['base_url'] = base_url().'kematian/kematian/get_kematian';
		$config['per_page'] = 5;

		////configurasi bootstrap

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative;top:-25px'>";
		$config['full_tag_close'] = "</ul>";
		$config['num_tag_open'] = "<li>";
		$config['num_tag_close'] = "</li>";
		$config['cur_tag_open'] = "<li class='disable'><li class='active'><a href=''>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tag_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tag_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tag_close'] = "</li>";
		$config['last_tag_open'] = "<li>";
		$config['last_tag_close'] = "</li>";

		$this->pagination->initialize($config);

		$data['halaman'] = $this->pagination->create_links();
		$data['offset'] = $offset;

		$data['data'] = $this->m_kematian->get_kematian($config['per_page'],$offset);
		$isi['judul'] = 'Tabel Kematian';
		$this->load->view('template/header', $isi);
		$this->load->view('kematian/v_kematian',$data);
		$this->load->view('template/footer');
	}

	function edit($id_penduduk)
	{
		$q['data'] = $this->m_kematian->edit($id_penduduk)->result();
		$q['data_count'] = $this->m_kematian->edit($id_penduduk)->num_rows();
		$q['halaman'] = 'Edit';

		$isi['judul'] = 'Edit Kematian';

		$q['rt'] = $this->db->get('rt')->result();

		$this->load->view('template/header',$isi);
		$this->load->view('kematian/v_edit',$q);
		$this->load->view('template/footer');
	}

	function update()
	{
		$post = $this->input->post();
		$id = $post['id_penduduk'];
		$update = $this->m_kematian->update($post,$id);
		$this->session->set_flashdata('msg','<p>Data Kematian Diupdate</p>');
		redirect('kematian/kematian/get_kematian');
		// if ($update) 
		// {
		// 	$this->session->set_flashdata('msg','<p>Data Kematian Diupdate</p>');
		// 	redirect('kematian/kematian/get_kematian');
		// } else
		// 	{
		// 		$this->session->set_flashdata('gagal','<p>Data Kematian Gagal Diupdate</p>');
		// 		redirect('kematian/kematian/get_kematian');
		// 	}
	}

	function surat()
	{
		$jabatan = $this->session->userdata('masuk');
		if ($jabatan == 'kadus' || $jabatan == 'rt' || $jabatan == 'rw') 
		{
			$data['judul'] = 'Surat Keterangan Kematian';
			$data['mati'] = $this->m_kematian->surat();

			// $this->db->select('rt');
			$this->db->order_by('rt');
			$rt = $this->db->get('rt')->result();
			// $angka = array_unique(array_column($rt, 'rt'));

			$data['rt'] = $rt;

			$this->load->view('template/header',$data);
			$this->load->view('kematian/v_surat',$data);
			$this->load->view('template/footer');
		} else {
			$url = base_url();
			redirect($url);
		}
	}


	//jquery
	function ktpmati()
	{
		$rtmati = $this->input->post('rtkematian');
		if ($rtmati) 
		{
			echo $this->m_kematian->ktp($rtmati);
		}
	}

	function json_ktp()
	{
		$ktpkematian = $this->input->post('ktpkematian');
		$data = $this->m_kematian->json_ktp($ktpkematian);
		echo json_encode($data);
	}

	// surat kematian

	function pemohon()
	{
		$rt = $this->input->post('rtpemohon');
		if ($rt) 
		{
			echo $this->m_kematian->list_pemohon($rt);
		} else 
			{
				echo "<option value=''>-----</option>";
			}
	}

	function namapemohon()
	{
		$ktp = $this->input->post('ktppemohon');
		$data = $this->m_kematian->namapemohon($ktp);
		echo json_encode($data);
	}

	// end jquery

	function print()
	{
		$this->load->library('pdf');
		$post = $this->input->post();
		$idadmin = $this->session->userdata('ses_id');
		$tgl = date('Y-m-d');
		$data = array(
			'ktp' => $post['ktpkematian'],
			'nama' => $post['namakematian'],
			'kelamin' => $post['kelaminkematian'],
			'ttl' => $post['ttlkematian'],
			'umur' => $post['umurkematian'],
			'agama' => $post['agamakematian'],
			'alamat' => $post['alamatkematian'],
			'tgl_mati' => $post['tanggalkematian'],
			'sebab' => $post['sebabkematian'],
			'lokasi' => $post['lokasikematian'],
			'tgl' => $tgl,
			'pemohon' => $post['pemohon'],
			'admin' => $this->m_kematian->admin($idadmin),
		);


		$id_penduduk = $post['ktppemohon'];
		$nama = $this->db->get_where('penduduk',['id_penduduk'=>$id_penduduk])->row_array();
		$jmlh = $this->db->get_where('transaksi',[
			'id_penduduk' => $id_penduduk,
			'transaksi' => 'Surat Keterangan Kematian',
			'bulan' => date("m"),
			'tahun' => date('Y'),
		])->result();

		if (count($jmlh)>=3) 
		{
			$this->session->set_flashdata('gagal','<p>Pemohon Dengan Nama '.$nama['nama'].' Nomor KTP '.$nama['no_ktp'].' Telah Melebihi Kuota Pengajuan Surat Keterangan Kematian Di bulan Ini</p>');
			redirect('kematian/kematian/surat');
		} else
			{
				// $trans = array(
				// 	'id_penduduk' => $post['ktppemohon'],
				// 	'transaksi' => 'Surat Keterangan Kematian',
				// 	'tanggal' => date('Y-m-d'),
				// 	'bulan' => date('m'),
				// 	'tahun' => date('Y'),
				// );
				// $this->db->insert('transaksi',$trans);

				$this->load->view('kematian/v_print',$data);
			}


	}

	function hapus_banyak()
	{
		$ktp = $this->input->post('ktp');
		$h = count($ktp);
		if ($this->session->userdata('masuk')=='kadus') 
		{
			if (!isset($ktp)) 
			{
				$this->session->set_flashdata('gagal','<p>Tidak Ada Data Yang Dipilih</p>');
				redirect('kematian/kematian/get_kematian');
			} else {
				foreach ($ktp as $key) 
				{
					$this->m_kematian->hapus_banyak($key);
				}
				$this->session->set_flashdata('msg','<p>'.$h.' Data Dihapus</p>');
				redirect ('kematian/kematian/get_kematian');
			}
		} else {
			$url = base_url();
			redirect($url);
		}
	}

	function remove($id_penduduk)
	{
		if ($this->session->userdata('masuk')=='kadus') 
		{
			$hapus = $this->m_kematian->hapus($id_penduduk);
			if ($hapus) 
			{
				$this->session->set_flashdata('msg','Data Dihapus');
				redirect('kematian/kematian/get_kematian');
			} else
				{
					$this->session->set_flashdata('gagal','Data Gagal Dihapus');
					redirect('kematian/kematian/get_kematian');
				}
		} else {
			$url = base_url();
			redirect($url);
		}
	}
}
 ?>