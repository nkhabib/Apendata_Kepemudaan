<?php
class Seksi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('seksi/m_seksi');
		if ($this->session->userdata('masuk') !=TRUE) 
		{
			$url = base_url();
			redirect($url);
		}
	}

	function get_seksi($offset=0)
	{
		$this->db->join('pemuda','pemuda.id_pemuda = seksi.id_pemuda');
		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$seksi = $this->db->get("seksi");
		$config['total_rows'] = $seksi->num_rows();
		$config['base_url'] = base_url().'seksi/seksi/get_seksi';
		$config['per_page'] = 5;

		/////config bootstrap
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

		$data['data'] = $this->m_seksi->get_seksi($config['per_page'],$offset);
		$isi['judul'] = 'Daftar Seksi Pemuda';
		$this->load->view('template/header', $isi);
		$this->load->view('seksi/v_seksi',$data);
		$this->load->view('template/footer');
	}

	function input_seksi()
	{
		$this->form_validation->set_rules('rt','RT','required|trim|numeric',
			[
				'required' => 'RT Tidak Boleh Kosong',
				'numeric' => 'Masukan Hanya Berupa Angka',
			]);
		$this->form_validation->set_rules('ktp','No KTP','required|trim|numeric|is_unique[seksi.id_pemuda]',
			[
				'required' => 'No KTP Tidak Boleh Kosong',
				'numeric' => 'No KTP Hanya Berupa Angka',
				'is_unique' => 'No KTP Sudah Digunakan',
			]);
		$this->form_validation->set_rules('nama','Nama','required|trim|min_length[3]',
			[
				'required' => 'Nama Tidak Boleh Kosong',
				'min_length' => 'Masukan Setidaknya 3 Karakter',
			]);
		$this->form_validation->set_rules('jk','Jenis Kelamin','required|trim',
			[
				'required' => 'Jenis Kelamin Tidak Boleh Kosong',
			]);
		$this->form_validation->set_rules('alamat','Alamat','required|trim|min_length[10]',
			[
				'required' => 'Alamat Tidak Boleh Kosong',
				'min_length' => 'Masukan Setidaknya 10 Karakter',
			]);
		$this->form_validation->set_rules('jabatan','Jabatan','required|trim',
			[
				'required' => 'Jabatan Tidak Boleh Kosong',
			]);
		if ($this->form_validation->run()==false) 
		{
			$rt = $this->input->post('rt');
			$data['rt'] = $this->db->get('rt')->result();
			$data['ktp'] = $this->m_seksi->ktpsubmit($rt);
			$data['judul'] = 'Tambah Seksi Pemuda';
			$this->load->view('template/header',$data);
			$this->load->view('seksi/v_input');
			$this->load->view('template/footer');
		} else {
			$berapa = $this->db->get_where('seksi',['jabatan' => $_POST['jabatan']])->result();
			$jumlah = count($berapa);
			if ($jumlah>=2) 
			{
				$this->session->set_flashdata('gagal','<p>Seksi '.$_POST['jabatan'].' Sudah Cukup</p>');
				redirect('seksi/seksi/get_seksi');
			} else
				{
					$post = $this->input->post();
					$add = $this->m_seksi->tambah_seksi($post);
					if ($add == TRUE) 
					{
						$this->session->set_flashdata('msg','<p>Seksi Pemuda Berhasil Ditambahkan</P');
						redirect ('seksi/seksi/get_seksi');
					} else {
						$this->session->set_flashdata('gagal','<p>Data Gagal Ditambahkan</p>');
						redirect('seksi/seksi/input_seksi');
					}

				}
		}
	}

	function ktpseksi()
	{
		$rt = $this->input->post('rt_seksi');
		if ($rt) 
		{
			echo $this->m_seksi->ktpseksi($rt);
		}
	}

	function jsoninput_seksi()
	{
		$ktp = $this->input->post('ktp_seksi');
		$data = $this->m_seksi->jsoninput_seksi($ktp);
		echo json_encode($data);
	}

	function edit($id_seksi)
	{
		if ($this->session->userdata('masuk')=='kpemuda')
		{
			$this->db->where('seksi.id_seksi',$id_seksi);
			$this->db->join('pemuda','pemuda.id_pemuda = seksi.id_pemuda');
			$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
			$query = $this->db->get('seksi',$id_seksi);
			if ($query->num_rows() > 0) 
			{
				$seksi = $query->result();
				$data = array(
					'page' => 'Edit',
					'data' => $seksi
				);
				$isi['judul'] = 'Edit Data Seksi';
				$this->load->view('template/header',$isi);
				$this->load->view('seksi/v_edit',$data);
				$this->load->view('template/footer');
			} else {
				$this->session->set_flashdata('gagal','Data Tidak Ditemukan');
				redirect('seksi/seksi/get_seksi');
			}
		} else {
			$url = base_url();
			redirect ($url);
		}
	}

	function update()
	{
		$post = $this->input->post();
		$id_seksi = $post['seksi'];
		$jabatan = $post['jabatan'];

		$sama = $this->db->get_where('seksi',['id_seksi'=>$id_seksi])->row_array();

		if ($sama['jabatan']==$jabatan) 
		{
			$this->session->set_flashdata('msg','<p>Data Seksi Diupdate</p>');
			redirect('seksi/seksi/get_seksi');
		} else
			{	
				$berapa = $this->db->get_where('seksi',['jabatan'=>$jabatan])->result();
				$jml = count($berapa);

				if ($jml>=2) 
				{
					$this->session->set_flashdata('gagal','<p>Gagal Update, Seksi'.$jabatan.' Sudah Cukup</p>');
					redirect('seksi/seksi/get_seksi');
				} else
					{
						$data = array(
							'jabatan' => $jabatan
						);
						$update = $this->m_seksi->update($id_seksi,$data);
						if ($update) 
						{
							$this->session->set_flashdata('msg','<p>Data Seksi Diupdate</p>');
							redirect('seksi/seksi/get_seksi');
						} else
							{
								$this->session->set_flashdata('gagal','<p>Data Seksi Gagal Diupdate</p>');
								redirect('seksi/seksi/get_seksi');	
							}
					}
			}

	}

	function hapus($id_seksi)
	{
		$this->db->where('id_seksi',$id_seksi);
		$this->db->delete('seksi');

		$this->session->set_flashdata('msg','<p>Data Seksi Dihapus</p>');
		redirect('seksi/seksi/get_seksi');
	}
}
 ?>