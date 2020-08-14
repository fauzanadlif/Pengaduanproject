<?php

Class Dashboard extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->model('model_system');
    }
    public function index1(){
        if ($this->session->userdata('status') !='login') {
            redirect('dashboard/register');
        }
        else if ($this->session->userdata('status') =='login') {
            redirect('dashboard/tampilan');
        }
    }
    public function masuk()
    {
        if ($this->session->userdata('status') =='login') {
            redirect('dashboard/tampilan');
        }
        $this->load->view('login');
    }

    public function tampilan(){
        $this->load->view('tampilan_awal.php');
    }

    public function index()
    {

        $this->load->view('home.php');
    }

    public function register()
    {
        $data['user'] = $this->model_system->get_user();
        $data['c_user'] = $this->model_system->count_user();

        $this->load->view('regist',$data);
    }

    public function login_action(){
        $usernames = $this->input->post('username');
        $passwords = $this->input->post('password');
        $where = array(
            'username ' => $usernames,
            'password' => $passwords
    );

    $cek = $this->model_system->cek_login("tb_user", $where)->num_rows();

    if ($cek > 0) {
        $data_session = array(
            'usernama' => $usernames,
            'status' => 'login'
        );

        $this->session->set_userdata($data_session);
        if ($this->session->userdata('status') == 'login') {
            header("location:" . base_url() . 'Dashboard/tampilan');
        } else {
            echo 'Login Gagal';
        }
    } else {
        echo 'Username dan Password Salah !';
    }
}

    public function simpan_data()
    {
        $this->model_system->simpan_db();
    }

    public function log_out()
    {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}