<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){
		parent::__construct();
		$this->load->model('m_main');
	}

	public function index()
	{
		$this->load->view('partial/header');
		$this->load->view('pages/login');
		$this->load->view('partial/footer');
	}

	public function act_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hasil = $this->m_main->is_user_login_ok($username, $password);
		if($hasil->num_rows()>0)
		{
			redirect('home/home',);
		}
		else
		{
			$this->load->view('pages/login');
		}
	}

	public function home()
	{
		$data['list'] = $this->m_main->get_all();
		$this->load->view('partial/header');
		$this->load->view('pages/home', $data);
		$this->load->view('partial/footer');
	}

	public function input_data()
	{
		$this->load->view('partial/header');
		$this->load->view('pages/input_data');
		$this->load->view('partial/footer');
	}

	public function insert(){
		$nama_depan = $this->input->post('nama_depan');
		$nama_belakang = $this->input->post('nama_belakang');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$no_hp = $this->input->post('no_hp');
		$alamat = $this->input->post('alamat');
		$gabung_data_pool = $nama_depan.$nama_belakang.$jenis_kelamin.$no_hp.$alamat;
		$prev_data= $this->m_main->get_last_data();
		$id = $prev_data['id']+1;
		
		$data_pool = array(
			'id' => $id,
			'nama_depan' => $nama_depan,
			'nama_belakang' => $nama_belakang,
			'jenis_kelamin'	=> $jenis_kelamin,
			'no_hp' => $no_hp,
			'alamat' => $alamat
		);
		$this->m_main->insert_data_pool($data_pool);

		$data = hash('adler32', $gabung_data_pool);
		$timestamp = date('Y-m-d H:i:s');
		$prevhash = $prev_data['hash'];
		$nonce = hash('adler32',"data blockchain");
		$gabung_string = $id.$data.$timestamp.$prevhash.$nonce;
		$hash = hash('adler32',$gabung_string);
		$data_blockchain = array(
			'id' => $id,
			'data'	=> $data,
			'timestamp' => $timestamp,
			'prev_hash' => $prevhash,
			'hash' => $hash,
			'nonce' => $nonce
		);
		$this->m_main->insert_data_blockchain($data_blockchain);
		redirect('home/home');
	}

	public function action_insert()
	{
		$cek_db = $this->m_main->get_data();
		if (!$cek_db)
		{
			$id = 0;
			$data = "genesis";
			$timestamp = date('Y-m-d H:i:s');
			$prevhash = 0;
			$nonce = hash('adler32',"data blockchain");
			$gabung_string = $id.$data.$timestamp.$prevhash.$nonce;
			$hash = hash('adler32',$gabung_string);
			$data_genesis = array(
				'id' => $id,
				'data'	=> $data,
				'timestamp' => $timestamp,
				'prev_hash' => $prevhash,
				'hash' => $hash,
				'nonce' => $nonce
			);
			$this->m_main->insert_data_blockchain($data_genesis);
			$this->insert();
		}
		else
		{
			$this->insert();
		};
	}

	public function data_cek()
	{
		$indeks = 1;
		$jumlah_data = $this->m_main->get_rows();
		$verified = 0;
		if($indeks<=$jumlah_data)
		{
			$data_pool=$this->m_main->get_data_pool_by_id($indeks);
			$gabung_data = $data_pool['nama_depan'].$data_pool['nama_belakang'].$data_pool['jenis_kelamin'].$data_pool['no_hp'].$data_pool['alamat'];
			$hash_gabung_data = hash('adler32', $gabung_data);
			$data_blockchain=$this->m_main->get_data_blockchain_by_id($indeks);
			if($hash_gabung_data!=$data_blockchain['hash'])
			{
				$verified = 1;
			}
			else
			{
				$verified = 0;
			}
			$indeks++;
		}
		if($verified == 0)
		{
			$this->session->set_flashdata('message','<center><div class="alert alert-success" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
                    <h4>Data Masih Asli</h4>
                    <p>Verified</p>
				</div></center>');
				redirect('home/home');
		}
		else
		{
			$this->session->set_flashdata('message','<center><div class="alert alert-danger" role="alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					</button>
                    <h4>Data Sudah Teretas</h4>
                    <p>Hacked</p>
				</div></center>');
			redirect('home/home');
		};
	}
}
