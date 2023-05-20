<?php

class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		if ($this->session->userdata('masuk') !=TRUE)
		{
			$url=base_url();
			redirect($url);
		}
	}

	function index()
	{
		$penduduk = $this->db->get_where('penduduk',['tahun' => date('Y')])->result();
		$jml = count($penduduk);

		$lk = $this->db->get_where('penduduk',array('jenis_kelamin' => 'Laki-laki', 'tahun'=>date('Y')))->result();
		$jmllk = count($lk);

		$pr = $this->db->get_where('penduduk',array('jenis_kelamin' => 'Perempuan','tahun'=>date('Y')))->result();
		$jmlpr = count($pr);

		$this->db->join('penduduk','penduduk.id_penduduk = pemuda.id_penduduk');
		$pmd = $this->db->get_where('pemuda',['tahun' => date('Y')])->result();
		$jmlpmd = count($pmd);

		$isi['judul'] = 'Menu utama';
		$isi['jml'] = $jml;
		$isi['lk'] = $jmllk;
		$isi['pr'] = $jmlpr;
		$isi['pmd'] = $jmlpmd;

		$this->load->view('template/header', $isi);
		$this->load->view('menu/menu');
		$this->load->view('template/footer');
	}
}
?>