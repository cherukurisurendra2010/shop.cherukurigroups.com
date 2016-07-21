<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends CI_Controller{
    function __construct() {
        parent::__construct();
        @session_start();
        $this->load->helper('url');
        
    }
    
    function signin(){
        try{
            if(isset ($_SESSION['user'])){
                redirect('user/profile');
            }
            $data = array('msg'=>'','status'=>'');
            if($this->input->post('username')){
                $this->load->model('users');
                $data = array();
                $data['username']= $this->input->post('username');
                $data['password']= $this->input->post('password');
                $result = $this->users->Authenticate($data);
                if($result){
                    @session_start();
                    $_SESSION['user'] = $result;
                    redirect('user/profile');
                }  else {
                    $data = array('msg'=>'Invalid Username and Password','status'=>'');
                }
            }

            $this->load->view('user/signin',$data);
        }  catch (Exception $ex){
            echo 'error';
        }
    }
    
    function registration(){
        if(isset ($_SESSION['user'])){
            redirect('user/profile');
        }
        $data_status = array('msg'=>'','status'=>'');
        if($this->input->post('username')){
            $this->load->model('users');
            $data = array();
            $data['username']= $this->input->post('username');
            $data['password']= md5($this->input->post('password'));
            $data['first_name']= $this->input->post('first_name');
            $data['last_name']= $this->input->post('last_name');
            $data['mobile']= $this->input->post('mobile');
            $data['email']= $this->input->post('email');
            //$returnvalue = $this->users->getUserDetails($data);    
            
            $returnValue = $this->users->CreateOrUpdateUser($data);
            if(is_array($returnValue)){
                if($returnValue->email==$data['email']){
                    $data_status = array('msg'=>'Email already existed.','status'=>'success');
                }
                if($returnValue->username==$data['username']){
                    $data_status = array('msg'=>'Username already existed.','status'=>'success');
                }
            }  else {
                if($returnValue){
                    $data_status = array('msg'=>'Registration Done Successfully.','status'=>'success');
                }  else {
                    $data_status = array('msg'=>'Registration Done Successfully.','status'=>'error');
                }
            }
        }
        $this->load->view('user/registration',$data_status);
        
        
    }
    
    function forgotpassword(){
        if(isset ($_SESSION['user'])){
            redirect('user/profile');
        }
    }
    
    function verifyuser(){
        if(isset ($_SESSION['user'])){
            redirect('user/profile');
        }
    }
    
    function profile(){
        $this->load->view('user/profile');
    }
    
    function logout(){
        session_destroy();
        redirect('user/signin');
        
    }
}

?>