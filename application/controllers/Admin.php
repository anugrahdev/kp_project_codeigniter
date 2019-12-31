<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_login();
        $this->load->model('usermanagement_model');
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer', $data);
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
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/usermanagement', $data);
        $this->load->view('templates/footer', $data);
    }

    public function delete($id)
    {
        $fileinfo = $this->usermanagement_model->delete($id);
        $delete = $this->db->delete('user', array('id' => $id));
        if ($delete) {
            $this->session->set_flashdata('message', 'Document Successfully Deleted!');
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
