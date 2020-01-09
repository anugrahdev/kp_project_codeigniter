<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('usermanagement_model');
        $this->load->model('Fungsibagian_model', 'fungsibagian_model');
        $this->load->model('fungsi_model');
        $this->load->model('bagian_model');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['count_user'] = $this->db->query("SELECT * FROM user WHERE role_id=2")->num_rows();
        $data['count_admin'] = $this->db->query("SELECT * FROM user WHERE role_id=1")->num_rows();
        $data['count_documents'] = $this->db->query("SELECT * FROM document")->num_rows();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function listBagian()
    {
        // Ambil data ID Provinsi yang dikirim via ajax post
        $id_fungsi = $this->input->post('id_fungsi');

        $bagian = $this->bagian_model->viewByFungsi($id_fungsi);

        // Buat variabel untuk menampung tag-tag option nya
        // Set defaultnya dengan tag option Pilih
        $lists = "<option value=''>No Selected</option>";

        foreach ($bagian as $data) {
            $lists .= "<option  value='" . $data->id . "'>" . $data->bagian_name . "</option>"; // Tambahkan tag option ke variabel $lists
        }

        $callback = array('list_bagian' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota
        echo json_encode($callback); // konversi varibael $callback menjadi JSON
    }

    public function count()
    {
        $query = $this->db->query("SELECT * FROM user");
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data = [
                'role' => $this->input->post('role'),
            ];
            $this->db->insert('user_role', $data);
            $this->session->set_flashdata('message', 'Role Added!');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where(
            'user_role',
            ['id' => $role_id]
        )->row_array();

        $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete_role($role_id)
    {
        $delete = $this->db->delete('user_role', array('id' => $role_id));
        if ($delete) {
            $this->session->set_flashdata('message', 'Role has been Successfully Deleted!');
            redirect('admin/role');
        }
    }

    public function edit_role($role_id)
    {

        $role = $this->input->post('role');
        $this->db->set('role', $role);
        $this->db->where('id', $role_id);
        $this->db->update('user_role');
        $this->session->set_flashdata('message', 'Role Edited!');
        redirect('admin/role');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Access Changed!</div>');
    }

    public function user_management()
    {
        $data['title'] = 'User Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['user_data'] = $this->usermanagement_model->get_users();
        $data['fungsi_data'] = $this->fungsi_model->view();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/usermanagement', $data);
        $this->load->view('templates/footer', $data);
    }

    public function edit_user($id)
    {
        // $name = $this->input->post('name');
        // $fungsi = $this->input->post('fungsi');
        // $bagian = $this->input->post('bagian');
        // $query = $this->db->query("UPDATE user SET name='$name',fungsi='$fungsi',bagian='$bagian' WHERE id='$id'");
        // if ($query) {
        //     $this->session->set_flashdata('message', 'User Edited!');
        // }
        // redirect('admin/user_management');
    }

    public function delete_user($email)
    {
        $delete = $this->db->delete('user', array('email' => $email));
        if ($delete) {
            $this->session->set_flashdata('message', 'User Successfully Deleted!');
            redirect('admin/user_management');
        }
    }

    public function fungsibagian()
    {
        $data['title'] = 'Fungsi & Bagian Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }
}
