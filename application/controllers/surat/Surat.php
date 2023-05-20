<?php
class Surat extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		} else 
			{
				$this->load->model('surat/m_surat');
			}
	}


	function cetaksurat()
	{
		$data['penduduk'] = $this->m_surat->cetaksurat();
		$data['rt'] = $this->m_surat->rt();
		$idadmin = $this->session->userdata('ses_id');
		$data['rtadmin'] = $this->m_surat->rtadmin($idadmin);
		$data['judul'] = 'Surat Pengantar';
		$this->load->view('template/header',$data);
		$this->load->view('surat/v_pengantar',$data);
		$this->load->view('template/footer');
	}

	function sktm()
	{
		$data['judul'] = 'SKTM';
		$idadmin = $this->session->userdata('ses_id');
		$masuk = $this->session->userdata('masuk');
		if ($masuk=='kadus' || $masuk=='rw') 
		{
			$data['rt'] = $this->m_surat->rt();
		} else
			{
				$data['rt'] = $this->m_surat->rtadmin($idadmin);
			}
		$this->load->view('template/header',$data);
		$this->load->view('surat/v_sktm');
		$this->load->view('template/footer');
	}

	function printsktm()
	{
		$this->load->library('pdf');
		$post = $this->input->post();
		$username = $this->session->userdata('ses_user');
		$tgl = date('Y-m-d');

		$bulan = date('Y-m-d', strtotime('+1 month', strtotime($tgl)));

		$pemohon = $this->db->get_where('penduduk',['id_penduduk'=>$post['ktpdinamis']])->row_array();
		$data = array(
			'ktp' => $pemohon['no_ktp'],
			'kelamin' => $post['kelamindinamis'],
			'nama' => $post['namadinamis'],
			'ttl' => $post['ttldinamis'],
			'kerja' => $post['kerjadinamis'],
			'status' => $post['kawindinamis'],
			'alamat' => $post['alamatdinamis'],
			'perlu' => $post['perlu'],
			'lain' => $post['lain'],
			'umur' => $post['umurdinamis'],
			'agama' => $post['agamadinamis'],
			'tanggal' => $tgl,
			'berlaku' => $bulan,
			'nama_rw' => $this->m_surat->rw(),
			// 'rt_admin' => $this->m_surat->rtadmin($username),
		 );

		if ($_POST['kerjadinamis'] == "PNS" || $_POST['kerjadinamis'] == "TNI") 
		{
			$this->session->set_flashdata('gagal','<p>Warga Dengan Pekerjaan PNS Atau TNI Tidak DIizinkan</p>');
			redirect('surat/surat/sktm');
		} else
			{
				$jml = $this->db->get_where('transaksi',[
					'id_penduduk'=> $post['ktpdinamis'],
					'transaksi' => 'Surat Keterangan Tidak Mampu',
					'bulan' => date('m'),
					'tahun' => date('Y'),
				])->result();


				if (count($jml)>=3) 
				{
					$nama = $this->db->get_where('penduduk',['id_penduduk'=>$post['ktpdinamis']])->row_array();
					$this->session->set_flashdata('gagal','<p>Pemohon Dengan nama '.$nama['nama'].' Nomor KTP '.$nama['no_ktp'].' Melebihi Batas Kuota SKTM Bulan Ini</p>');
					redirect('surat/surat/sktm');
				} else 
					{
						$trans = array(
							'id_penduduk' => $post['ktpdinamis'],
							'transaksi' => 'Surat Keterangan Tidak Mampu',
							'tanggal' => date('Y-m-d'),
							'bulan' => date('m'),
							'tahun' => date('Y'),
						);

						$this->db->insert('transaksi',$trans);

						$idadmin = $this->session->userdata('ses_id');
						$this->db->join('rt','rt.id_rt = penduduk.id_rt');
						$data['rt_admin'] = $this->db->get_where('penduduk',['id_penduduk' => $idadmin])->row_array();

						$this->load->view('surat/v_printsktm',$data);
					}
			}

	}

	function pktp()
	{
		$data['judul'] = "Pengantar KTP";
		$data['rt'] = $this->db->get('rt')->result();
		$this->load->view('template/header',$data);
		$this->load->view('surat/v_pktp');
		$this->load->view('template/footer');
	}

	function pktpList()
	{
		$rt = $this->input->post('idRt');
		if ($rt) 
		{
			echo $this->m_surat->listPktp($rt);
		}
	}

	function printpktp()
	{
		$this->form_validation->set_rules('rtSelect','RT','required|trim|numeric',
			[
				'required' => 'Pilih RT',
				'numeric' => 'RT Berupa Angka',
			]);
		$this->form_validation->set_rules('no_kk','Nomo KK','required|trim|numeric|min_length[16]|max_length[16]',
			[
				'required' => 'Nomor KK Harus Diisi',
				'numeric' => 'Nomor KK Berupa Angka',
				'min_length' => 'Nomor KK Minimal 16 Angka',
				'max_length' => 'Nomor KK Maksimal 16 Angka',
			]);
		$this->form_validation->set_rules('nama','Nama','required|max_length[200]',
			[
				'required' => 'Nama Tidak Boleh Kosong',
				'max_length' => 'Nama Maksimal 200 Karakter',
			]);
		$this->form_validation->set_rules('ttl','Tanggal Lahir','required|date',
			[
				'required' => 'Tangaal Lahir Tidak Boleh Kosong',
				'date' => 'Masukan Hanya Berupa Tanggal',
			]);
		$this->form_validation->set_rules('kelamin','Jenis Kelamin','required',
			[
				'required' => 'Pili Jenis Kelamin',
			]);
		$this->form_validation->set_rules('umur','umur','required|trim|numeric|greater_than[16]',
			[
				'required' => 'Umur Tidak Boleh Kosong',
				'numeric' => 'umur Berupa Angka',
				'greater_than' => 'Minimal Umur 17 Tahun',
			]);
		$this->form_validation->set_rules('agama','Agama','required',
			[
				'required' => 'Agama Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('status','Status','required',
			[
				'required' => 'Pilih Status',
			]);
		$this->form_validation->set_rules('alamat','Alamat','required',
			[
				'required' => 'Alamat Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required',
			[
				'required' => 'Pekerjaan Tidak Boleh Kosong',
			]);
		if ($this->form_validation->run()==false) 
		{
			$data['judul'] = "Pengantar KTP";
			$data['rt'] = $this->db->get('rt')->result();
			$this->load->view('template/header',$data);
			$this->load->view('surat/v_pktp');
			$this->load->view('template/footer');
		} else
			{
				$post = $this->input->post();

				$pktp = $this->db->get_where('transaksi',[
					'no_kk' => $post['no_kk'],
					'bulan' => date('m'),
					'tahun' => date('Y'),
					'nama_pembuat' => $post['nama'],
				])->result();
				$countTrans = count($pktp);
				if ($countTrans >= 3) 
				{
					$this->session->set_flashdata('gagal','Pemohon dengan <br>Nomor KK : '.$post['no_kk'].'<br> Nama :'.$post['nama'].'<br><br>Bulan : '.date('M').'<br>Telah melebihi batas permohonan pembuatan KTP');
					redirect('surat/surat/pktp');
				} else
					{
						$this->load->library('pdf');
						$user = $this->session->userdata('ses_id');
						$pnddk = $this->db->get_where('penduduk',['id_penduduk' => $user])->row_array();
						$namaadmin = $pnddk['nama'];
						$rtadmin = $this->session->userdata('ses_rt');
						$alamatadmin = $pnddk['alamat'];
						$tgl = date('Y-m-d');
						$bulan = date('Y-m-d', strtotime('+1 month', strtotime($tgl)));
						

						$data = array(
							'nama' => $post['nama'],
							'noKK' => $post['no_kk'],
							'ttl' => $post['ttl'],
							'umur' => $post['umur'],
							'kelamin' => $post['kelamin'],
							'agama' => $post['agama'],
							'status' => $post['status'],
							'alamat' => $post['alamat'],
							'kerja' => $post['pekerjaan'],
							'namaadmin' => $namaadmin,
							'rtadmin' => $rtadmin,
							'alamatadmin' => $alamatadmin,
							'tanggal' => date('Y-m-d'),
							'berlaku' => $bulan,
						);

						$trans = array(
							'id_penduduk' => 0,
							'no_kk' => $post['no_kk'],
							'nama_pembuat' => $post['nama'],
							'transaksi' => 'Pengantar KTP',
							'tanggal' => date('Y-m-d'),
							'bulan' => date('m'),
							'tahun'=> date('Y'),
						);

						$this->db->insert('transaksi',$trans);

						$this->load->view('surat/v_printpktp',$data);
					}
			}
	}

	function list()
	{
		$rt = $this->input->post('id_rtdinamis');
		if ($rt) 
		{
			echo $this->m_surat->list($rt);
		}
		// $rt = $this->input->post('rt');
		// echo "$rt";
		// // $data['list'] = $this->m_surat->list($rt);
	}

	function name()
	{
		$ktp = $this->input->post('ktpdinamis');
		$data = $this->m_surat->name($ktp);
		echo json_encode($data);
		//json_encode adalah merubah array php menjadi json
		//json_decode adalah merubah string json menjadi variabel php
		// if ($ktp) 
		// {
		// 	echo $this->m_surat->name($ktp);
		// }
	}

	function print()
	{
		// $jabatan = $this->session->userdata('masuk');
		$this->load->library('pdf');
		$post = $this->input->post();

		$ktp = $post['ktpdinamis'];
		$pnddk = $this->db->get_where('penduduk',['id_penduduk' => $ktp]) ->row_array();
		$ayah = $this->db->get_where('penduduk',['no_kk' => $pnddk['no_kk'],'jenis_kelamin' => 'Laki-laki'])->row_array();
		$ibu = $this->db->get_where('penduduk',
			['no_kk' => $pnddk['no_kk'],'jenis_kelamin' => 'Perempuan','statuskeluarga' => 'Istri'])->row_array();


		$username = $this->session->userdata('ses_user');
		$tgl = date('Y-m-d');

		$bulan = date('Y-m-d', strtotime('+1 month', strtotime($tgl)));
		$data = array(
			'ktp' => $pnddk['no_ktp'],
			'kelamin' => $post['kelamindinamis'],
			'nama' => $post['namadinamis'],
			'ttl' => $post['ttldinamis'],
			'kerja' => $post['kerjadinamis'],
			'status' => $post['kawindinamis'],
			'alamat' => $post['alamatdinamis'],
			'jenis' => $post['jenis'],
			'lain' => $post['lain'],
			'umur' => $post['umurdinamis'],
			'agama' => $post['agamadinamis'],
			'tanggal' => $tgl,
			'berlaku' => $bulan,
			'nama_rw' => $this->m_surat->rw(),
			'rt_admin' => $this->m_surat->rtadmin($username),
			'desa' => $post['desa'],
			'kec' => $post['kec'],
			'kab' => $post['kab'],
			'prov' => $post['prov'],
			'alasan' => $post['alasan'],
			'jumlah' => $post['jumlah'],
			'kk' => $pnddk['no_kk'],
			'anak' => $post['anak'],
			'ttlanak' => $post['ttlanak'],
			'ayah' => $ayah['nama'],
			'ibu' => $ibu['nama'],
		 );

		$jml = $this->db->get_where('transaksi',[
			'id_penduduk'=> $ktp,
			'transaksi' => $post['jenis'],
			'bulan' => date('m'),
			'tahun' => date('Y'),
		])->result();

		$nama = $this->db->get_where('penduduk',['id_penduduk'=>$ktp,])->row_array();

		if (count($jml)>=3) 
		{
			$this->session->set_flashdata('gagal','<p>Pemohon Dengan Nama '.$nama['nama'].' Nomor KTP '.$nama['no_ktp'].' Telah Melebihi Batas Kuota '.$post['jenis'].'</p>');
			redirect('surat/surat/cetaksurat');
		} else
			{
				$trans = array(
					'id_penduduk' => $post['ktpdinamis'],
					'transaksi' => $post['jenis'],
					'tanggal' => date('Y-m-d'),
					'bulan' => date('m'),
					'tahun' => date('Y'),
				);

				$this->db->insert('transaksi',$trans);
				$this->load->view('surat/v_print',$data);				
			}
	}
}