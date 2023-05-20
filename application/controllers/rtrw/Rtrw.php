<?php
class Rtrw extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('rtrw/m_rtrw');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url=base_url();
			redirect($url);
		}
	}

	function get_rtrw()
	{
		$data['judul'] = "Tabel Ketua RT/RW";
		$data['data'] = $this->m_rtrw->get_rtrw();
		$this->load->view('template/header',$data);
		$this->load->view('rtrw/v_rtrw',$data);
		$this->load->view('template/footer');
	}

	function input_rtrw()
	{
		$rt = $this->input->post('rt_rw');
		$jabatan = $this->input->post('jabatan_rtrw');
		$this->form_validation->set_rules('rt_rw', 'RT', 'required|trim|numeric',
			[
			'required' => 'RT harap dipilih',
			]); /* trim berfungsi agar spasi tidak ikut tersimpan di database*/ 
		$this->form_validation->set_rules('ktp_rtrw', 'Nomor KTP', 'required|trim|numeric',
			[
				'required' => 'NO KTP tidak boleh kosong',
				'numeric' => 'NO KTP harus berupa angka',
			]);
		$this->form_validation->set_rules('kk_rtrw', 'KK', 'required|trim|numeric',
			[
				'required' => 'No KK tidak boleh kosong',
				'numeric' => 'No KK harus berisi angka saja',
			]);
		$this->form_validation->set_rules('nama_rtrw', 'Nama', 'required|trim',
			[
				'required' => 'Nama tidak boleh kosong',
			]);
		$this->form_validation->set_rules('ttl_rtrw', 'Tanggal Lahir', 'required|trim', 
			[
				'required' => 'Tanggal lahir tidak boleh kosong',
			]);
		$this->form_validation->set_rules('kelamin_rtrw', 'Kelamin', 'required|trim',
			[
				'required' => 'Jenis kelamin tidak boleh kosong',
			]);
		$this->form_validation->set_rules('umur_rtrw', 'Umur', 'required|trim|numeric', 
			[
				'required' => 'Umur tidak boleh kosong',
				'numeric' => 'umur harus berupa angka',
			]);
		$this->form_validation->set_rules('status_rtrw', 'Status', 'required|trim',
			[
				'required' => 'Status tidak boleh kosong',
			]);
		$this->form_validation->set_rules('agama_rtrw', 'Agama', 'required|trim',
			[
				'required' => 'Agama tidak boleh kosong',
			]);
		$this->form_validation->set_rules('alamat_rtrw', 'Alamat', 'required|trim',
			[
				'required' => 'Alamat tidak boleh kosong',
			]);
		$this->form_validation->set_rules('pekerjaan_rtrw', 'Pekerjaan', 'required|trim',
			[
				'required' => 'Pekerjaan tidak boleh kosong',
			]);
		$this->form_validation->set_rules('jabatan_rtrw', 'Jabatan', 'required|trim|is_unique[rt_rw.jabatan]',
			[
				'is_unique' => "".$jabatan." Sudah ada",
				'required' => 'Jabatan tidak boleh kosong',
			]);
		$this->form_validation->set_rules('username_rtrw', '', 'required|trim|is_unique[user.username]|min_length[3]',
			[
				'is_unique' => 'Username sudah ada',
				'required' => 'Username tidak boleh kosong',
				'min_length' => 'Username minimal 3 karakter',
			]);
		$this->form_validation->set_rules('password_rtrw','', 'required|trim|min_length[3]',
			[
				'required' => 'Password tidak boleh kosong',
				'min_length' => 'Password minimal 3 karakter',
			]);

		$data['judul'] = "Tambah Ketua Rt/RW"; // ini adalah penulisan array dalam format berbeda
		if ($this->form_validation->run()==false) 
		{
			$rt = $this->input->post('rt_rw');
			$data['jabatan'] = $this->input->post('jabatan_rtrw');
			$data['ktp'] = $this->m_rtrw->ktp_tombol($rt);
			$data['rt'] = $this->m_rtrw->rt();
			$data['rt_post'] = $this->db->get_where('rt',['id_rt' => $rt])->row_array();
			$data['post_rt'] = $rt;
			$this->load->view('template/header',$data);
			$this->load->view('rtrw/v_input');
			$this->load->view('template/footer');
		} else
			{
				$post = $this->input->post();
				$tambah = $this->m_rtrw->tambah($post);

				if ($tambah == TRUE) 
				{
					$this->session->set_flashdata('msg','Data Berhasil Ditambahkan');
					redirect('rtrw/rtrw/get_rtrw');
				} else 
					{
						$this->session->set_flashdata('gagal','Data Gagal Ditambahkan');
						redirect('rtrw/rtrw/get_rtrw');
					}
			}
	}
	
	function ktp_rtrw() // jquery
	{
		$rt = $this->input->post('rt_rw');
		if ($rt) 
		{
			echo $this->m_rtrw->ktp($rt);
		}
	}

	function json_rtrw() //jquey json
	{
		$ktp = $this->input->post('ktp_rtrw');
		$data = $this->m_rtrw->json_rtrw($ktp);
		echo json_encode($data);
	}

	function jabatanrt() // jquery
	{
		$ktp = $this->input->post('ktp_rtrw');
		echo $this->m_rtrw->jabatanrt($ktp);
	}


	function cari()
	{
		$data['cariberdasarkan']=$this->input->post('cariberdasarkan');
		$data['yangdicari']=$this->input->post('yangdicari');

		$data['rtrw']=$this->m_rtrw->carirtrw($data['cariberdasarkan'],$data['yangdicari'])->result();
		$data['jumlah']=count($data["rtrw"]);

		$isi['judul'] = 'Hasil Pencarian';
		$this->load->view("template/header", $isi);
		$this->load->view("rtrw/v_cari",$data);
		$this->load->view("template/footer");
	}

	function edit($id)
	{
		if ($this->session->userdata('masuk')=='kadus') 
		{
			$judul['judul'] = "Edit RT/RW";
			$sql['data'] = $this->m_rtrw->edit($id);
			$this->load->view('template/header',$judul);
			$this->load->view('rtrw/v_edit',$sql);
			$this->load->view('template/footer');
		} else
			{
				redirect('home');
			}
	}

	function update()
	{
		$this->form_validation->set_rules('kk','NO KK','min_length[16]|max_length[16]|required',
			[
				'min_length' => "Masukan 16 karakter",
				'max_length' => "Maksimal 16 karakter",
				'required' => "No KK Tidak Boleh Kosong",
			]);

		$this->form_validation->set_rules('umur','Umur','required|greater_than[16]',
			[
				'required' => "umur Tidak Boleh Kosong",
				'greater_than' => "Minimal Usia 17 Tahun",
			]);
		$this->form_validation->set_rules('jabatan','Jabatan','required|is_unique[rt_rw.jabatan]',
			[
				'is_unique' => "Jabatan Sudah Ada",
			]);
		$id = $_POST['id'];
		if ($this->form_validation->run()==FALSE) 
		{
			$this->db->where('penduduk.id_penduduk',$id);
			$this->db->from('penduduk');
			$this->db->join('rt_rw','rt_rw.id_penduduk = penduduk.id_penduduk');
			$this->db->join('rt','rt.id_rt = penduduk.id_rt');
			$sql = $this->db->get('')->result();
			$data['judul'] = "Edit RT/RW";
			$data['data'] = $sql;
			$this->load->view('template/header',$data);
			$this->load->view('rtrw/v_edit');
			$this->load->view('template/footer');
		} else
			{
				$post = $this->input->post();
				$update = $this->m_rtrw->update($post,$id);
				if ($update) 
				{
					$this->session->set_flashdata('msg','<p>Data RT / RW Diupdate</p>');
					redirect('rtrw/rtrw/get_rtrw');
				} else
					{
						$this->session->set_flashdata('gagal','<p>Data RT / RW Gagal Diupdate</p>');
						redirect('rtrw/rtrw/get_rtrw');
					}
			}
	}

	function hapus($id_penduduk)
	{
		$masuk = $this->session->userdata('masuk');
		if ($masuk == 'kadus') 
		{
			$del = $this->m_rtrw->hapus($id_penduduk);
			if ($del) 
			{
				$this->session->set_flashdata('msg','<p>Data RT/RW Dihapus</p>');
				redirect('rtrw/rtrw/get_rtrw');
			} else {
				$this->session->set_flashdata('gagal','<p>Data Gagal Dihapus<p/>');
				redirect('rtrw/rtrw/get_rtrw');
			}
		} else {
			$url = base_url();
			redirect($url);
		}
	}

	function hapusbanyak()
	{
		$id_penduduk = $this->input->post('ktp');
		if (!isset($id_penduduk)) 
		{
			$this->session->set_flashdata('gagal','<p>Tidak Ada Data yang Dipilih</p>');
			redirect('rtrw/rtrw/get_rtrw');
		} else 
			{
				if ($this->session->userdata('masuk')=='kadus') 
				{
					$h = count($id_penduduk);
					$masuk = $this->session->userdata('masuk');
						
					foreach ($id_penduduk as $id) 
					{
						$this->m_rtrw->hapusbanyak($id);
					}

					$this->session->set_flashdata('msg','<p>'.$h.' Berhasil Dihapus</p>');
					redirect('rtrw/rtrw/get_rtrw');
				} else {
					$url = base_url();
					redirect($url);
				}
			}
	}
}