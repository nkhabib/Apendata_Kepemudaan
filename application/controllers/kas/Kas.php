<?php

class Kas extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('kas/m_kas');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url = base_url();
			redirect($url);
		}
	}
	function get_kas()
	{
		$data['data'] = $this->m_kas->get_kas();
		$data['judul'] = 'Tabel Kas Pemuda';
		$this->load->view('template/header', $data);
		$this->load->view('kas/v_kas');
		$this->load->view('template/footer');
	}

	function input_kas()
	{
		$user = $this->session->userdata('masuk');
		if ($user=='kpemuda'||$user=='bendahara')
		{
			$this->form_validation->set_rules('tanggal','Tanggal','required|trim',
				[
				'required' => 'Tanggal Tidak Boleh Kosong',
				]);

			$this->form_validation->set_rules('keterangan','Keterangan','required|trim',
				[
					'required' => 'Keterangan Tidak Boleh Kosong',
				]);

			$this->form_validation->set_rules('jumlah','Jumlah','required|trim|numeric',
				[
					'required' => 'Jumlah Tidak Boleh Kosong',
					'numeric' => 'Masukan Hanya Berupa Angka',
				]);

			$this->form_validation->set_rules('makel','Masuk/Keluar','required|trim',
				[
					'required' => 'Wajib Memilih',
				]);

			if ($this->form_validation->run()==false) 
			{
				$isi['judul'] = "Tambah Kas Pemuda";
				$this->load->view('template/header',$isi);
				$this->load->view('kas/v_input');
				$this->load->view('template/footer');
			} else {
				$kas = $this->db->get('kas_pemuda')->num_rows();
				if ($kas = 0) 
				{
					$lastSaldo = 0;
				} else
					{
						$this->db->select('saldo_ahir');
						$this->db->order_by('id','DESC');
						$this->db->limit(1);
						$lastKas = $this->db->get('kas_pemuda')->row_array();
						$lastSaldo = $lastKas['saldo_ahir'];
					}
				
				$post = $this->input->post();
				$tgl = $post['tanggal'];
				$ket = $post['keterangan'];
				$jml = $post['jumlah'];
				$makel = $post['makel'];

				if ($makel == 'Masuk') 
				{
					$finalSaldo = $lastSaldo+$jml;
				} elseif ($makel == 'Keluar') 
					{
						$finalSaldo = $lastSaldo-$jml;
					}

				$data = array(
					'tanggal' => $tgl,
					'makel' => $makel,
					'keterangan' => $ket,
					'jumlah' => $jml,
					'saldo_ahir' => $finalSaldo,
				);
				$add = $this->m_kas->tambah($data);

				if ($add == TRUE) 
				{
					$this->session->set_flashdata('msg','<p>Kas Berhasil Ditambahkan</p>');
					redirect('kas/kas/get_kas');
				} else {
					$this->session->set_flashdata('gagal','<p>Kas Gagal Ditambahkan</p>');
					redirect('kas/kas/get_kas');
				}
			}
			
		} else {
			$url = base_url();
			redirect($url);
		}
	}

	function hapus($id)
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'kpemuda'|| $masuk == 'bendahara')
		{
			$delete = $this->db->get_where('kas_pemuda',['id' => $id])->row_array();
			$allSaldo = $this->db->get_where('kas_pemuda',
				[
					'tanggal>=' => $delete['tanggal'],
					'id>' => $delete['id'],
				])
			->result();

			if (count($allSaldo)>0)
			{
				foreach ($allSaldo as $as) 
				{
					$this->db->where('id',$as->id);
					if ($delete['makel']=='Masuk') 
					{	
						$this->db->set('saldo_ahir',$as->saldo_ahir-$delete['jumlah']);
					} elseif ($delete['makel']=='Keluar') 
						{
							$this->db->set('saldo_ahir',$as->saldo_ahir+$delete['jumlah']);
						}
					$this->db->update('kas_pemuda');
				}
			}


			$this->m_kas->hapus($id);
			$this->session->set_flashdata('msg','<p>Data Kas Dihapus</p>');
			redirect('kas/kas/get_kas');
		} else {
			$url = base_url();
			redirect($url);
		}
	}

	function laporan()
	{
		$this->form_validation->set_rules('tahun','Tahun','required',
			[
				'required' => 'Harap Pilih Tahun Laporan',
			]);
		if ($this->form_validation->run() == FALSE) 
		{
			$data['judul'] = 'Cetak Laporan Kas Pemuda';
			$this->load->view('template/header',$data);
			$this->load->view('kas/v_laporan');
			$this->load->view('template/footer');
		} else {
			$post = $this->input->post();
			$tahun = $post['tahun'];
			$row = $this->m_kas->cetak($tahun);
			if ($row == TRUE) 
			{
				$data['data'] = $this->m_kas->cetak($tahun);
				$data['tahun'] = $tahun;
				$data['judul'] = 'Laporan Keuangan Karang Taruna';
				$this->load->view('template/header',$data);
				$this->load->view('kas/v_print');
				$this->load->view('template/footer');
			} else
				{
					$this->session->set_flashdata('gagal','<p>Tahun yang anda pilih tidak ada data keuangan</p>');
					redirect('kas/kas/laporan');
				}
		}
	}

	function hapusbanyak()
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'kpemuda' || $masuk == 'bendahara') 
		{
			$id = $this->input->post('id');
			$jml = count($id);
			if ($jml == 0 ) 
			{
				$this->session->set_flashdata('gagal','<p>Tidak Ada Data Yang Dipilih</p>');
				redirect('kas/kas/get_kas');
			} else
				{
					foreach ($id as $key) 
					{
						$this->m_kas->hapus($key);
					}
					$this->session->set_flashdata('msg','<p>'.$jml.' Dihapus</p>');
					redirect('kas/kas/get_kas');
				}
		} else {
			$url = base_url();
			redirect($url);
		}
	}

	function edit($id)
	{
		redirect ('login/logout');
		die();

		// $masuk = $this->session->userdata('masuk');
		// if ($masuk == 'kpemuda' || $masuk == 'bendahara') 
		// {
		// 	$data['judul'] = 'Edit Kas';
		// 	$data['data'] = $this->db->get_where('kas_pemuda', array('id' => $id, ))->result();
		// 	$this->load->view('template/header',$data);
		// 	$this->load->view('kas/v_edit');
		// 	$this->load->view('template/footer');
		// } else {
		// 	$url = base_url();
		// 	redirect($url);
		// }
	}

	function update()
	{
		redirect ('login/logout');
		die();
		// $post = $this->input->post();

		// $update = $this->m_kas->update($post);
		// if ($update == TRUE) 
		// {
		// 	$this->session->set_flashdata('msg','<p>Data Berhasil Update</p>');
		// 	redirect('kas/kas/get_kas');
		// } else {
		// 	$this->session->set_flashdata('gagal','<p>Data Gagal Update</p>');
		// 	redirect('kas/kas/get_kas');
		// }

	}
}
?>