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
            $config['file_name'] = $_FILES['upload']['name'];

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('upload')) {

                try {
                    $uploadData = $this->upload->data();
                    $filename = $uploadData['file_name'];

                    //set file data to insert to database
                    $file['file_password'] = $this->input->post('password');
                    $file['description'] = $this->input->post('description');
                    $file['file_name'] = $filename;
                    $file['uploader'] = $this->input->post('uploader');

                    $query = $this->files_model->insertfile($file);

                    $path = FCPATH . "assets/files/" . $filename;
                    $watermarkText = FCPATH . 'assets/img/logo.png';
                    $pdf = new FPDI_Protection($path, $watermarkText);
                    $pdf->SetProtection(array('print'), $this->input->post('password'));
                    $pdf->AddPage();
                    $pdf->SetFont('Arial', '', 12);
                    if ($pdf->numPages > 1) {
                        for ($i = 2; $i <= $pdf->numPages; $i++) {
                            $pdf->_tplIdx = $pdf->importPage($i);
                            $pdf->AddPage();
                        }
                    }
                    $pdf->Output($path, 'F');
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
                $this->session->set_flashdata('message', 'Cannot upload file');
                redirect('document');
            }
        } else {
            $this->session->set_flashdata('message', 'Cannot upload empty file');
            redirect('document');
        }
    }
    public function download($id)
    {
        $this->load->helper('download');
        $fileinfo = $this->files_model->download($id);
        $file = 'assets/files/' . $fileinfo['file_name'];
        force_download($file, NULL);
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

    public function view($id)
    {
        // The location of the PDF file 
        // on the server 
        $fileinfo = $this->files_model->download($id);
        $file = 'assets/files/' . $fileinfo['file_name'];
        // Header content type 
        header("Content-type: application/pdf");
        header("Content-Length: " . filesize($file));
        // Send the file to the browser. 
        readfile($file);
    }
}
