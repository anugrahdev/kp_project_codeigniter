<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Document extends CI_Controller
{
    function  __construct()
    {
        parent::__construct();
        //load our helper
        $this->load->helper('url');
        //load our model
        $this->load->model('files_model');
        $this->load->library('pdf');
        is_login();
    }
    public function index()
    {
        $data['title'] = 'PDF';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        if ($this->session->userdata('role_id') == 1) {
            $data['document'] = $this->files_model->getAllFiles();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('document/admin', $data);
            $this->load->view('templates/footer', $data);
        } else {
            $data['document'] = $this->files_model->getFiles($this->session->userdata('email'));
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('document/index', $data);
            $this->load->view('templates/footer', $data);
        }
    }
    public function insert()
    {
        //load session library to use flashdata
        //Check if file is not empty
        if (!empty($_FILES['upload']['name'])) {
            $config['upload_path'] = 'assets/files';
            //restrict uploads to this mime types
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '100000';
            $config['file_name'] = $_FILES['upload']['name'];
            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            try {
                $this->upload->do_upload('upload');
                $uploadData = $this->upload->data();
                $filename = $uploadData['file_name'];
                //set file data to insert to database
                $file['file_password'] = $this->input->post('password');
                $file['description'] = $this->input->post('description');
                $file['file_name'] = $filename;
                $file['uploader'] = $this->input->post('uploader');
                $query = $this->files_model->insertfile($file);
            } catch (Exception $e) {
                $this->session->set_flashdata('message', $e);
                redirect('document');
            }
            if ($query) {
                $this->session->set_flashdata('message', 'Document Successfully Uploaded!');
                redirect('document');
            } else {
                $this->session->set_flashdata('message', 'File uploaded but not inserted to database');
                redirect('document');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot upload empty file');
            redirect('document');
        }
    }
    public function multiple()
    {
        //Load upload library and initialize configuration
        $this->load->library('upload');
        $files = $_FILES;
        $file_name = $_FILES['userfile']['name'];
        $desc = $this->input->post('description');
        $pass = $this->input->post('file_password');
        $uploader = $this->input->post('uploader');
        $cpt = count($_FILES['userfile']['name']);
        if (!empty($file_name)) {
            for ($i = 0; $i < $cpt; $i++) {
                try {
                    $_FILES['userfile']['name'] = $files['userfile']['name'][$i];
                    $_FILES['userfile']['type'] = $files['userfile']['type'][$i];
                    $_FILES['userfile']['tmp_name'] = $files['userfile']['tmp_name'][$i];
                    $_FILES['userfile']['error'] = $files['userfile']['error'][$i];
                    $_FILES['userfile']['size'] = $files['userfile']['size'][$i];
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload();
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];
                    $query = $this->db->query("insert into document (file_name,description,file_password,uploader) values('$filename','$desc[$i]','$pass[$i]','$uploader[$i]')");
                } catch (Exception $e) {
                    $this->session->set_flashdata('message', $e);
                    redirect('document');
                }
            }
            if ($query) {
                $this->session->set_flashdata('message', 'Document Successfully Uploaded!');
                redirect('document');
            } else {
                $this->session->set_flashdata('message', 'File uploaded but not inserted to database');
                redirect('document');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot upload empty file');
            redirect('document');
        }
    }

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = 'assets/files/';
        //restrict uploads to this mime types
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = '100000';
        $config['file_name'] = $_FILES['userfile']['name'];

        return $config;
    }

    // public function download($id)
    // {
    //     $this->load->helper('download');
    //     $fileinfo = $this->files_model->download($id);
    //     $file = 'assets/files/' . $fileinfo['file_name'];
    //     force_download($file, NULL);
    // }

    public function download_secure($filename)
    {
        $fileinfo = $this->files_model->getp($filename);
        // $file = 'assets/files/' . $fileinfo['file_name'];
        $path = FCPATH . "assets/files/" . $filename;
        $watermarkText = FCPATH . 'assets/img/logogs.png';
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d/M/Y h:i:s a');
        $uploader = $this->session->userdata('name') . ' / ' . $this->session->userdata('email');
        $pdf = new FPDI_Protection($path, $watermarkText, $uploader, $date);

        $pfile = $fileinfo['file_password'];
        if ($pfile != null) {
            $pdf->SetProtection(array(), $pfile);
        } else {
            $pdf->SetProtection(array(), '');
        }


        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        if ($pdf->numPages > 1) {
            for ($i = 2; $i <= $pdf->numPages; $i++) {
                $pdf->_tplIdx = $pdf->importPage($i);
                $pdf->AddPage();
            }
        }
        $pdf->Output($filename, 'D');
    }

    public function delete($id)
    {
        $fileinfo = $this->files_model->delete($id);
        $file = 'assets/files/' . $fileinfo['file_name'];
        $delete = $this->db->delete('document', array('id' => $id));
        unlink(FCPATH . $file);
        if ($delete) {
            $this->session->set_flashdata('message', 'Document Successfully Deleted!');
            redirect('document');
        }
    }
    public function edit()
    {
        $deskripsi = $this->input->post('description');
        $pw = $this->input->post('password');
        $this->m_barang->edit_barang($pw, $deskripsi);
        redirect('document');
    }

    public function view($filename)
    {
        $fileinfo = $this->files_model->getpassword($filename);
        // $file = 'assets/files/' . $fileinfo['file_name'];
        $path = FCPATH . "assets/files/" . $filename;
        $watermarkText = FCPATH . 'assets/img/logogs.png';
        date_default_timezone_set('Asia/Jakarta');
        $date = date('d/M/Y h:i:s a');
        $uploader = $this->session->userdata('name') . ' / ' . $this->session->userdata('email');
        $pdf = new FPDI_Protection($path, $watermarkText, $uploader, $date);

        $pfile = $fileinfo['file_password'];
        if ($pfile != null) {
            $pdf->SetProtection(array(), $pfile);
        } else {
            $pdf->SetProtection(array(), '');
        }


        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 12);
        if ($pdf->numPages > 1) {
            for ($i = 2; $i <= $pdf->numPages; $i++) {
                $pdf->_tplIdx = $pdf->importPage($i);
                $pdf->AddPage();
            }
        }
        $pdf->Output();
    }
}
