<?php

Class Dashboard extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->model('model_system');                                       
		$this->load->helper(array('url', 'form')); 	
    }

    public function index1(){
        if ($this->session->userdata('status') !='login') {
            redirect('dashboard/register');
        }
        else if ($this->session->userdata('status') =='login') {
            redirect('dashboard/UserDashboard');
        }
    }


    public function lihat_tanggapan()
    {
        $this->load->view('lihat_tanggapan');
    }
    public function laporan()
    {
        $data['user'] = $this->model_system->get_pengaduan();
        $data['c_user'] = $this->model_system->count_pengaduan();
        $this->load->view('laporan', $data);
    }

    public function tulis_pengaduan()
    {
        $this->load->view('tulis_pengaduan');
    }

    public function admin_tampilan()
    {
        $this->load->view('admin_tampilan');
    }

    public function tampilan_user()
    {
        $this->load->view('UserDashboard');
    }

    public function tanggapi()
    {
        $this->load->view('tanggapan');
    }

    public function petugas_tanggapan()
    {
        $data['user'] = $this->model_system->get_pengaduan();
        $data['c_user'] = $this->model_system->count_pengaduan();
        $this->load->view('petugas_tampilan', $data);
    }

    

    public function masuk()
    {

        $this->load->view('login.php');
    }

    public function register()
    {
        $data['user'] = $this->model_system->get_user();
        $data['c_user'] = $this->model_system->count_user();

        $this->load->view('regist',$data);
    }

    // public function preview_regist()
    // {
    //     $data['user'] = $this->model_system->get_user();
    //     $data['c_user'] = $this->model_system->count_user();
    //     $this->load->view('preview_regist',$data);
        
    // }

    public function previewData_pengaduan()
    {
        $dataa['user'] = $this->model_system->get_user();
        $dataa['c_user'] = $this->model_system->count_user();
        $this->load->view('previewData_pengaduan',$dataa);
        
    }

   

    public function exportPdf()
	{
		$data['pengaduan'] = $this->model_system->tampil_pengaduanbaru();
		$this->load->library('pdf');
		$this->pdf->setPaper('A4','potrait');
		$this->pdf->filename = "data-pengaduan-baru". date('d-m-y') .".pdf";
		$this->pdf->load_view('previewData_pengaduan',$data);
    }
    
    public function exportExcel()
	{
		// Load plugin PHPExcel nya
		include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

		// Panggil class PHPExcel nya
		$excel = new PHPExcel();
		// Settingan awal fil excel
		$excel->getProperties()->setCreator('My Notes Code')
			->setLastModifiedBy('My Notes Code')
			->setTitle("Data Pengaduan")
			->setSubject("Pengaduan")
			->setDescription("Laporan Semua Data Pengaduan")
			->setKeywords("Data Pengaduan");
		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA PENGADUAN"); // Set kolom A1 dengan tulisan "DATA SISWA"
		$excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
		$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A3', "ID PENGADUAN"); // Set kolom A3 dengan tulisan "NO"
		$excel->setActiveSheetIndex(0)->setCellValue('B3', "TANGGAL dan WAKTU"); // Set kolom B3 dengan tulisan "NIS"
		$excel->setActiveSheetIndex(0)->setCellValue('C3', "NIK"); // Set kolom C3 dengan tulisan "NAMA"
		$excel->setActiveSheetIndex(0)->setCellValue('D3', "ISI LAPORAN"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
		$excel->setActiveSheetIndex(0)->setCellValue('E3', "FOTO"); // Set kolom E3 dengan tulisan "ALAMAT"
		$excel->setActiveSheetIndex(0)->setCellValue('F3', "STATUS"); // Set kolom E3 dengan tulisan "ALAMAT"
		// Apply style header yang telah kita buat tadi ke masing-masing kolom header
		$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
		// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
		$pengaduan = $this->model_system->tampil_pengaduanbaru();
		$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
		foreach ($pengaduan as $data) { // Lakukan looping pada variabel siswa
			$excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $data->id);
			$excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->tanggal);
			$excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nik);
			$excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->laporan);
			$excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->foto);
			$excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->status);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);

			$numrow++; // Tambah 1 setiap kali looping
		}
		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setWidth(15); // Set width kolom A
		$excel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Set width kolom B
		$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
		$excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
		$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
		$excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // Set width kolom E

		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("Laporan Data Siswa");
		$excel->setActiveSheetIndex(0);
		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Data-Pengaduan-' . date('d-m-Y') . '.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');
		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}



    public function simpan_to_pengaduan()
	{
		$this->model_system->simpanPengaduan();
	}

    
    public function base()
    {
        $data['user'] = $this->model_system->get_user();
        $data['c_user'] = $this->model_system->count_user();

        $this->load->view('data_tampil',$data);
    }

    public function doneUpload()
	{
		$this->load->view('upload_berhasil');
    }
    
    
    public function doneEdit()
	{
		$this->load->view('edit_berhasil');
	}

    public function simpan_data()
    {
        $this->model_system->simpan_db();
    }

    public function deleteData($id)
    {
        $this->model_system->deleteData($id);
    }

    public function index(){
        $this->load->view('home.php');
    }
    public function login(){
        if($this->session->userdata('status') =='login') {
            redirect('Dashboard/UserDashboard');
        }
        $this->load->view('login');
    }

    public function editdatapeng($id){
        $where = ['id' => $id];
        $data['user'] = $this->model_system->edit_datapeng($where, 'pengaduan')->result();
        $this->load->view('editData', $data);
    }

    public function update_pengaduan($id)
    {
        $tanggals = $this->input->post('date');
        $niks = $this->input->post('nik');
        $laporans = $this->input->post('isiLaporan');
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
                        $this->db->set($data);
                        $this->db->where('id', $id);
                        $this->db->update('pengaduan');
                        header("Location:".base_url()."dashboard/doneEdit");
                    } else {                
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);

                    }
                }
    }

    public function login_action()
    {
        $usernamess = $this->input->post('Email');
        $passwordss = $this->input->post('Password');

        $where = array(
            'email' => $usernamess,
            'password' => $passwordss
        );

        $check = $this->model_system->cek_login($where)->num_rows();
        if ($check > 0) {
            $role = $this->model_system->cek_login($where)->row(0)->level;
            if ($role == 'admin' || $role == 'petugas') {
                $current_role = $this->model_system->cek_login($where)->row(0)->level;
                $current_id = $this->model_system->cek_login($where)->row(0)->id_petugas;
                $name = $this->model_system->cek_login($where)->row(0)->nama_petugas;
                $data_session = array(
                    'id' => $current_id,
                    'nama' => $name,
                    'username' => $usernamess,
                    'role' => $current_role,
                    'status' => 'signin'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'signin') {
                    header("Location:" . base_url() . 'Dashboard/petugas_tanggapan');
                } else {
                    header("Location:" . base_url(). 'Dashboard/admin_tampilan');
                }
            } else {
                $current_id = $this->model_system->cek_login($where)->row(0)->nik;
                $name = $this->model_system->cek_login($where)->row(0)->name;
                
                $data_session = array(
                    'nama' => $name,
                    'nik' => $current_id,
                    'username' => $usernamess,
                    'role' => 'masyarakat',
                    'status' => 'signin'
                );
                $this->session->set_userdata($data_session);
                if ($this->session->userdata('status') == 'signin') {
                    header("Location:" . base_url() . 'Dashboard/tampilan_user');
                } else {
                    header("Location:" . base_url());
                }
            }
        } else {
            echo 'login gagal';
        }
    }

    public function signout()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function datapetugas()
    {
        $data['petugas'] = $this->model_system->view_petugas();
        $this->load->view('petugas/index', $data);
    }

    public function simpan_petugas(){
        if($this->model_system->validation("save")){ // Jika validasi sukses atau hasil validasi adalah true
          $this->model_system->save(); // Panggil fungsi save() yang ada di SiswaModel.php
          // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
          $html = $this->load->view('petugas/view', array('petugas'=>$this->model_system->view_petugas()), true);
          $callback = array(
            'status'=>'sukses',
            'pesan'=>'Data berhasil disimpan',
            'html'=>$html
          );
        }else{
          $callback = array(
            'status'=>'gagal',
            'pesan'=>validation_errors()
          );
        }
        echo json_encode($callback);
    }


    
    public function ubah_petugas($id){
        if($this->model_system->validation("update")){ // Jika validasi sukses atau hasil validasi adalah true
          $this->model_system->edit($id); // Panggil fungsi edit() yang ada di SiswaModel.php
          // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
          $html = $this->load->view('petugas/view', array('petugas'=>$this->model_system->view_petugas()), true);
          $callback = array(
            'status'=>'sukses',
            'pesan'=>'Data berhasil diubah',
            'html'=>$html
          );
        }else{
          $callback = array(
            'status'=>'gagal',
            'pesan'=>validation_errors()
          );
        }
        echo json_encode($callback);
    }

    public function hapus_petugas($id){
        $this->model_system->delete($id); // Panggil fungsi delete() yang ada di SiswaModel.php
        // Load ulang view.php agar data yang baru bisa muncul di tabel pada view.php
        $html = $this->load->view('petugas/view', array('petugas'=>$this->model_system->view_petugas()), true);
        $callback = array(
          'status'=>'sukses',
          'pesan'=>'Data berhasil dihapus',
          'html'=>$html
        );
        echo json_encode($callback);
    }
}