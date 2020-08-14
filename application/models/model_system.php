<?php

    class model_system extends CI_Model{

        public function simpan_db()
        {
            $data = array (
                'id' => "",
                'nm_pelanggan' => $this->input->post('nama'),
                'username' => $this->input->post('users'),
                'password' => $this->input->post('paw')
            );
            $this->db->insert('tb_user', $data);
            header("Location:".base_url().'Dashboard/masuk');
        }
        public function get_user()
        {
            $data = $this->db->get('tb_user');
            return $data->result();
        }
        public function count_user()
        {
            $data = $this->db->get('tb_user');
            return $data->num_rows();
        }
        public function cek_login($table, $where)
        {   
        return $this->db->get_where($table, $where);
        }   
    }
?>