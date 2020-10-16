<?php

    class model_system extends CI_Model{

        public function simpan_db()
        {
            $data = array (
                'id' => "",
                'name' => $this->input->post('nama'),
                'nik' => $this->input->post('nikk'),
                'email' => $this->input->post('emaill'),
                'password' => $this->input->post('pw'),
                
            );
            $this->db->insert('table_user',$data);
            header("Location:".base_url().'Dashboard/masuk');
            
        }

        public function edit_datapeng($where, $table)
        {
            return $this->db->get_where($table, $where);
        }

        public function update_datapeng($where, $data, $table)
        {
            $this->db->where($where);
            $this->db->update($table, $data);
            header("Location:" . base_url('Dashboard/laporan'));
        }

        public function simpanPengaduan()
        {
            $foto = $_FILES['foto']['tmp_name'];
                if ($foto = '') {
                    // kosong
                    $foto="kosong";
                    echo $foto;
                    die();
                } else {
                    $config['upload_path'] = './asset/img';
                    $config['allowed_types'] = 'jpg|png|gif';

                    $this->load->library('upload');
                    $this->upload->initialize($config);
                    if ($this->upload->do_upload('foto')) {
                        
                        $foto = $this->upload->data('file_name');
                        $data = array (
                            'id' => null,
                            'nik' => $this->session->userdata('nik'),
                            'laporan' => $this->input->post('isiLaporan'),
                            'foto' => $foto,
                            'status' => '0'
                        );
                        $this->db->set('tanggal','NOW()',FALSE);
                        $this->db->insert('pengaduan',$data);
                        header("Location:".base_url()."dashboard/doneUpload");
                    } else {                
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);

                    }
                }
            
      
        }

        public function tampil_pengaduanbaru()
        {
            $query = $this->db->query("SELECT * FROM `pengaduan` WHERE `status` = '0'");
            return $query->result();
        }

        public function deleteData($id)
        {
            $where = array('id' => $id);
            $this->db->where($where);
            $this->db->delete('pengaduan');
            header("location:".base_url()."dashboard/laporan");
        }

        public function ambilData()
        {
            return $this->db->get('pengaduan');
        }
        public function get_user()
        {
            $data = $this->db->get('table_user');
            return $data->result();
        }
        public function count_user()
        {
            $data = $this->db->get('table_user');
            return $data->num_rows();
        }

        public function get_pengaduan()
        {
            $data = $this->db->get('pengaduan');
            return $data->result();
        }
        public function count_pengaduan()
        {
            $data = $this->db->get('pengaduan');
            return $data->num_rows();
        }
    

    
    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    // Cek Signin
    public function cek_login($where)
    {
        $petugas = $this->db->get_where("table_petugas", $where);
        $masyarakat = $this->db->get_where("table_user", $where);
        if ($petugas->result() == null) {
            return $masyarakat;
        }else {
            return $petugas;
        }
    }

    public function view_petugas() {
        return $this->db->get('table_petugas')->result();
    }

    public function validation($mode){
        $this->load->library('form_validation');
    
        if($mode == "save")
            $this->form_validation->set_rules('name', 'Nama', 'required|max_length[35]');
        $this->form_validation->set_rules('emaill', 'Email', 'required|max_length[25]');
        $this->form_validation->set_rules('pw', 'Password', 'required|max_length[32]');
        $this->form_validation->set_rules('telpon', 'Telepon', 'required|max_length[13]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        if($this->form_validation->run())
          return true;
        else
          return false;
      }
    
        public function save(){
            $data = array(
              'nama_petugas' => $this->input->post('name'),
              'email' => $this->input->post('emaill'),
              'password' => $this->input->post('pw'),
              'telp' => $this->input->post('telpon'),
              'level' => $this->input->post('level')
    
            );
            $this->db->insert('table_petugas', $data);
        }
    
         public function edit($id){
            $data = array(
                'nama_petugas' => $this->input->post('name'),
                'email' => $this->input->post('emaill'),
                'password' => $this->input->post('pw'),
                'telp' => $this->input->post('telpon'),
                'level' => $this->input->post('level')
    
            );
            $this->db->where('id_petugas', $id);
            $this->db->update('table_petugas', $data);
        }
    
        public function delete($id){
        $this->db->where('id_petugas', $id);
        $this->db->delete('table_petugas'); // Untuk mengeksekusi perintah delete data
      }

    
}

?>