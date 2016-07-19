<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
        
        public function viewusers()
        {
		$variable = $this->load->database();
                $query = $this->db->get("users"); 
                $data['records'] = $query->result();
                $result = array('data'=>$data['records']);
                //print_r($variable);
                $this->load->view('view_users',$result);
	}
        
        public function users()
        {
            $data = array();
            if($this->input->post("first_name")){
                echo $this->input->post("first_name");
                $data['name']=$this->input->post("first_name");
            }
            if($this->input->post("user_name")){
                echo $this->input->post("user_name");
                $data['username']=$this->input->post("user_name");
            }
            if($this->input->post("password")){
                echo $this->input->post("password");
                $data['password']=md5($this->input->post("password"));
            }
            $this->load->model("users");
            if($this->input->post("password")){
                echo $this->input->post("password");
                
                $this->users->insert($data);
            }
                $data =  $this->users->getAll();
                $result = array('data'=>$data);
                //print_r($variable);
                $this->load->view('users',$result);
	}
}
