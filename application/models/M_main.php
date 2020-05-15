<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_main extends CI_Model {

        public function is_user_login_ok($username, $password){
			$query=$this->db->query("SELECT * FROM user WHERE username='$username' AND password='$password'LIMIT 1");
			return $query;
		}

		public function get_data(){
			$query=$this->db->query("SELECT * FROM data_blockchain")->result();
			return $query;
		}

		public function get_data_pool_by_id($id)
		{
			$query=$this->db->query("SELECT * FROM data_pool WHERE id='$id'")->row_array();
			return $query;
		}

		public function get_rows()
        {
            $query = $this->db->query("SELECT count(*) AS jumlah FROM data_blockchain");
            return $row_cnt = $query->num_rows;
        }

		public function get_data_blockchain_by_id($id)
		{
			$query=$this->db->query("SELECT * FROM data_blockchain WHERE id='$id'")->row_array();
			return $query;
		}

		public function get_all()
		{
			$query =$this->db->query("SELECT * FROM data_pool ORDER BY id")->result();
			return $query;
		}

		public function get_last_data()
        {
            $query = $this->db->query("SELECT * FROM data_pool ORDER BY id DESC LIMIT 1;")->row_array();
            return $query;
        }

		public function get_last_id()
		{
			$query = $this->db->query("SELECT id FROM data_pool ORDER BY id DESC LIMIT 1;");
			return $query;
		}
		
		public function insert_data_pool($data)
		{
			return $this->db->insert('data_pool', $data);
		}

		public function insert_data_blockchain($data)
		{
			return $this->db->insert('data_blockchain', $data); 
		}
	}