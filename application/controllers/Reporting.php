<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;
class Reporting extends CI_Controller {
    public function index()
    {
        $this->load->model('reporting_model');
        $data['reporting']= $this->reporting_model->get_all();
        $this->load->view('print',$data);
    }
    public function print($search = null)
    {   
        $this->load->library('dompdf_gen');
        $this->load->model('reporting_model');
        $data['reporting'] = $this->reporting_model->get_all($search);
        $this->load->view('print',$data);
        $html = $this->output->get_output();

        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('print.pdf');
        unset($html);
        unset($dompdf);
    }
    
}