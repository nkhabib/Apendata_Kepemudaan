<?php
class Cetak extends CI_Controller
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
				$this->load->model('print/m_print');
			}
	}

	function cetak()
	{
		$this->db->order_by('id_rt');
		$rt = $this->db->get('rt')->result();

		$ada['rt'] = $rt;
		$ada['judul'] = 'Pilih Data';
		// $satu['get'] = array_unique($tahun);  ini berfungsi untuk : jika didalam array ada nilai yang sama maka akan dijadikan satu. misal didalam array ada nilai a, a, a, sebanyak apapun maka yang ditampilkan hanya a satu kali saja
		$isi['judul'] = 'Pilih Laporan';
		$this->load->view("template/header",$isi);
		$this->load->view("cetak/v_cetak",$ada);
		$this->load->view("template/footer");
	}

	function print()
	{
		$post = $this->input->post();

		$tahun = $this->db->get_where('penduduk',['tahun' => $post['tahun']])->result();
		if ($tahun == TRUE) 
		{
			$tipe ['data'] = $this->m_print->penduduk($post);
			$tipe['laki'] = $this->m_print->jmllaki($post);
			$tipe['cewek'] = $this->m_print->jmlcewek($post);
			$tipe['kepala'] = $this->m_print->jmlkepala($post);
			$tipe['jenis'] = $post['jenis'];
			if ($post['jenis']=='penduduk') 
			{
				$tipe['jmlrt'] = $this->m_print->jmlrt($post);
			} else
				{
					$rt = $this->db->get_where('rt',['id_rt'=>$post['jenis']])->row_array();
					$tipe['macam'] = "RT. ".$rt['rt'];
				}
			
			$tipe['tahun'] = $post['tahun'];
			$tipe['tanggal'] = tgl_indo(date('Y-m-d'));

			

			$data['judul'] = 'Laporan Penduduk';

			$this->load->view('template/header',$data);
			$this->load->view('cetak/v_print',$tipe);
			$this->load->view('template/footer');
		} else
			{
				$this->session->set_flashdata('gagal','Tidak Ada Data Di Tahun '.$post['tahun']);
				redirect('cetak/cetak/cetak');
			}

	}


	function transaksi ()
	{
		$this->db->order_by('rt','ASC');
		$rt = $this->db->get('rt')->result();
		$data['judul'] = 'Cetak Transaksi';
		$data['rt'] = $rt;
		$this->load->view('template/header',$data);
		$this->load->view('cetak/v_transaksi');
		$this->load->view('template/footer');
	}

	///jquery

	function list()
	{
		$rt = $this->input->post('rttrans');
		if ($rt) 
		{
			echo $this->m_print->list($rt);
		}
	}

	function name()
	{
		$ktp = $this->input->post('ktptransaksi');
		$data = $this->m_print->name($ktp);
		echo json_encode($data);
	}
	///end jquery

	function printtrans()
	{
		$tahun = $_POST['tahun'];
		$nama = $_POST['nama'];
		$ktp = $_POST['ktp'];
		$get = $this->m_print->printtrans($ktp);

		$trans = $this->m_print->trans($ktp,$tahun);
		$row = $trans->row_array();
		
		$data['penduduk'] = $get;
		$data['trans'] = $trans;
		$data['tahun'] = $tahun;

		if ($row['tahun'] > 1) 
		{
			if ($row['id_penduduk'] > 1) 
			{
				$data['judul'] = 'Laporan Transaksi';
				$this->load->view('template/header',$data);
				$this->load->view('cetak/v_ptrans');
				$this->load->view('template/footer');
			}
		} else
			{
				$this->session->set_flashdata('gagal','Tidak ada transaksi untuk '.$nama.' di tahun '.$tahun);
				redirect('cetak/cetak/transaksi');
			}

	}

	function pdf($data)
	{
		echo $data;
	}

}